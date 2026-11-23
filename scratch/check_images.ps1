Add-Type -AssemblyName System.Drawing

$dir = "C:\Users\USER\.gemini\antigravity\brain\e10c6ab3-a508-483a-aa95-ed6d0f544d35\.user_uploaded"
$files = Get-ChildItem -Path $dir | Sort-Object LastWriteTime -Descending | Select-Object -First 10

foreach ($f in $files) {
    try {
        $img = [System.Drawing.Image]::FromFile($f.FullName)
        Write-Host "$($f.Name) | $($img.Width)x$($img.Height) | PixelFormat: $($img.PixelFormat)"
        $img.Dispose()
    } catch {
        Write-Host "$($f.Name) | Not an image"
    }
}
