Add-Type -AssemblyName System.Drawing

$p = "C:\Users\USER\.gemini\antigravity\brain\e10c6ab3-a508-483a-aa95-ed6d0f544d35\.user_uploaded\media_1795334372253_28a18491.png"
$bmp = New-Object System.Drawing.Bitmap($p)
$centerPixel = $bmp.GetPixel([int]($bmp.Width / 2), [int]($bmp.Height / 2))
Write-Host "Center pixel color: A=$($centerPixel.A), R=$($centerPixel.R), G=$($centerPixel.G), B=$($centerPixel.B)"

$cornerPixel = $bmp.GetPixel(0, 0)
Write-Host "Corner (0,0) pixel color: A=$($cornerPixel.A), R=$($cornerPixel.R), G=$($cornerPixel.G), B=$($cornerPixel.B)"

$bmp.Dispose()
