<?php

$bde = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530034511_bde71393.jpg';
$p53 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614478_5339ac4a.jpg';

// Let's create an HTML page comparing these images side by side so we know everything
$b64_bde = base64_encode(file_get_contents($bde));
$b64_p53 = base64_encode(file_get_contents($p53));

$u1 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$b64_u1 = base64_encode(file_get_contents($u1));

$html = "<html><body style='background:#222; color:#fff;'>
<div style='display:flex; gap:20px;'>
  <div><h3>bde71393.jpg</h3><img src='data:image/jpeg;base64,$b64_bde' style='width:350px;'></div>
  <div><h3>5339ac4a.jpg</h3><img src='data:image/jpeg;base64,$b64_p53' style='width:350px;'></div>
  <div><h3>User screenshot (2257f078.jpg)</h3><img src='data:image/jpeg;base64,$b64_u1' style='width:350px;'></div>
</div></body></html>";

file_put_contents('c:/Users/USER/Herd/simpultemu_kami/scratch/compare_roads.html', $html);
echo "HTML written to scratch/compare_roads.html\n";
