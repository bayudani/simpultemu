$cloudflaredPath = "C:\Users\USER\.config\herd\bin\cloudflared.exe"
if (-not (Test-Path $cloudflaredPath)) {
    $found = Get-Command "cloudflared" -ErrorAction SilentlyContinue
    if ($found) { $cloudflaredPath = $found.Source }
}

$targetUrl = "http://simpultemu_kami.test"
$logFile = "$PSScriptRoot\storage\logs\cloudflared.log"
$tunnelTxt = "$PSScriptRoot\public\tunnel_url.txt"

if (-not (Test-Path "$PSScriptRoot\storage\logs")) {
    New-Item -ItemType Directory -Path "$PSScriptRoot\storage\logs" -Force | Out-Null
}
if (Test-Path $logFile) { Remove-Item $logFile -Force }

$argList = @(
    "tunnel",
    "--url", $targetUrl,
    "--protocol", "http2",
    "--http-host-header", "simpultemu_kami.test"
)

Write-Host "Menjalankan Cloudflare Tunnel ke $targetUrl..."
$proc = Start-Process -FilePath $cloudflaredPath -ArgumentList $argList -PassThru -NoNewWindow -RedirectStandardError $logFile

$foundUrl = $null
$attempts = 0
while ($attempts -lt 40) {
    Start-Sleep -Milliseconds 500
    $attempts++
    if (Test-Path $logFile) {
        $logContent = Get-Content -Path $logFile -Raw -ErrorAction SilentlyContinue
        if ($logContent -match '(https://[a-zA-Z0-9-]+\.trycloudflare\.com)') {
            $foundUrl = $matches[1]
            break
        }
    }
}

if ($foundUrl) {
    Set-Content -Path $tunnelTxt -Value $foundUrl -Force -Encoding UTF8
    Write-Host "CLOUDFLARE_TUNNEL_URL: $foundUrl"
} else {
    Write-Host "GAGAL_MENDAPATKAN_URL"
}

# Tetap berjalan agar proses tunnel hidup terus
if ($proc) {
    $proc.WaitForExit()
}
