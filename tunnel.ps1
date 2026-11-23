# Cloudflare Quick Tunnel Runner for SimpulTemu
$Host.UI.RawUI.WindowTitle = "Cloudflare Tunnel - SimpulTemu"

Write-Host "==================================================================" -ForegroundColor Cyan
Write-Host "     MEMULAI CLOUDFLARE TUNNEL UNTUK SIMPULTEMU...                " -ForegroundColor Yellow
Write-Host "==================================================================" -ForegroundColor Cyan

# 1. Locate cloudflared binary
$cloudflaredCmd = Get-Command "cloudflared" -ErrorAction SilentlyContinue
$cloudflaredPath = if ($cloudflaredCmd) { $cloudflaredCmd.Source } else { "$env:USERPROFILE\.config\herd\bin\cloudflared.exe" }

if (-not (Test-Path $cloudflaredPath)) {
    Write-Host "[ERROR] cloudflared.exe tidak ditemukan di sistem Anda." -ForegroundColor Red
    Read-Host "Tekan Enter untuk keluar..."
    exit 1
}

# 2. Determine target local URL (simpultemu_kami.test or localhost:8000)
$targetUrl = "http://simpultemu_kami.test"
try {
    $testHerd = Invoke-WebRequest -Uri "http://simpultemu_kami.test" -Method Head -TimeoutSec 2 -UseBasicParsing -ErrorAction Stop
    $targetUrl = "http://simpultemu_kami.test"
} catch {
    try {
        $testReq = Invoke-WebRequest -Uri "http://localhost:8000" -Method Head -TimeoutSec 2 -UseBasicParsing -ErrorAction Stop
        $targetUrl = "http://localhost:8000"
    } catch {
        $targetUrl = "http://simpultemu_kami.test"
    }
}

Write-Host "Target Lokal: $targetUrl" -ForegroundColor Gray
Write-Host "Sedang meminta link HTTPS publik dari Cloudflare (mohon tunggu 3-5 detik)..." -ForegroundColor Yellow

$logFile = "$PSScriptRoot\storage\logs\cloudflared.log"
if (-not (Test-Path "$PSScriptRoot\storage\logs")) {
    New-Item -ItemType Directory -Path "$PSScriptRoot\storage\logs" -Force | Out-Null
}
if (Test-Path $logFile) { Remove-Item $logFile -Force }

$argList = "tunnel --url $targetUrl"
if ($targetUrl -like "*simpultemu_kami.test*") {
    $argList += " --http-host-header simpultemu_kami.test"
}

$proc = Start-Process -FilePath $cloudflaredPath -ArgumentList $argList -PassThru -NoNewWindow -RedirectStandardError $logFile

$foundUrl = $null
$attempts = 0
while ($attempts -lt 40) {
    Start-Sleep -Milliseconds 500
    $attempts++
    if (Test-Path $logFile) {
        $logContent = Get-Content -Path $logFile -Raw -ErrorAction SilentlyContinue
        if ($logContent -match '\|\s+(https://[a-zA-Z0-9-]+\.trycloudflare\.com)\s+\|' -or 
            ($logContent -match '(https://(?!api\b)[a-zA-Z0-9-]+\.trycloudflare\.com)' -and -not ($logContent -match 'failed to request quick Tunnel'))) {
            $foundUrl = $matches[1]
            break
        }
    }
}

if ($foundUrl) {
    # Save to public/tunnel_url.txt so dashboard can auto-detect it
    $tunnelTxt = "$PSScriptRoot\public\tunnel_url.txt"
    Set-Content -Path $tunnelTxt -Value $foundUrl -Force
    
    # Try copying to Windows clipboard
    try { Set-Clipboard -Value $foundUrl } catch {}

    Clear-Host
    Write-Host ""
    Write-Host "==================================================================" -ForegroundColor Green
    Write-Host "   🚀 CLOUDFLARE TUNNEL BERHASIL AKTIF & SIAP DIBAGIKAN!           " -ForegroundColor Green
    Write-Host "==================================================================" -ForegroundColor Green
    Write-Host ""
    Write-Host "  Link Publik (HTTPS) : " -NoNewline -ForegroundColor White
    Write-Host $foundUrl -ForegroundColor Yellow
    Write-Host ""
    Write-Host "  Status              : " -NoNewline -ForegroundColor White
    Write-Host "ONLINE (Bisa dibuka di HP manapun di dunia!)" -ForegroundColor Green
    Write-Host "  Clipboard           : " -NoNewline -ForegroundColor White
    Write-Host "URL Otomatis Tersalin ke Clipboard!" -ForegroundColor Cyan
    Write-Host "  Dashboard           : " -NoNewline -ForegroundColor White
    Write-Host "Dashboard SimpulTemu Otomatis Memakai Link Ini!" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "==================================================================" -ForegroundColor DarkGray
    Write-Host "  PENTING: Jangan tutup jendela ini selama tamu sedang mengakses  " -ForegroundColor Yellow
    Write-Host "  undangan. Tekan Ctrl+C untuk berhenti jika sudah selesai.        " -ForegroundColor DarkGray
    Write-Host "==================================================================" -ForegroundColor DarkGray
    Write-Host ""

    try {
        $proc.WaitForExit()
    } finally {
        if (Test-Path $tunnelTxt) { Remove-Item $tunnelTxt -Force }
    }
} else {
    Write-Host "[WARNING] Tidak dapat mendeteksi URL Cloudflare secara otomatis dalam 15 detik." -ForegroundColor Yellow
    Write-Host "Silakan cek log di $logFile" -ForegroundColor Gray
    try {
        $proc.WaitForExit()
    } finally {
        if (Test-Path "$PSScriptRoot\public\tunnel_url.txt") {
            Remove-Item "$PSScriptRoot\public\tunnel_url.txt" -Force
        }
    }
}
