<?php

$fRef = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$fNew = 'c:/Users/USER/Herd/simpultemu_kami/scratch/test_new_pendopo.png';

$b64Ref = base64_encode(file_get_contents($fRef));
$b64New = base64_encode(file_get_contents($fNew));
$b64Cur = base64_encode(file_get_contents('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795573026909_409601d6.png'));

$html = "<html><body style='background:#1a1a1a; color:#eee; font-family:sans-serif; text-align:center;'>
<h2>Visual Verification: Ground Alignment</h2>
<div style='display:flex; justify-content:center; gap:20px;'>
  <div><h4>Reference from User (36bccb95.png)</h4><img src='data:image/png;base64,$b64Ref' style='width:320px; border:2px solid gold;'></div>
  <div><h4>New Ground Alignment</h4><img src='data:image/png;base64,$b64New' style='width:320px; border:2px solid #4CAF50;'></div>
  <div><h4>Current (User said ngambang 409601d6.png)</h4><img src='data:image/png;base64,$b64Cur' style='width:320px; border:2px solid red;'></div>
</div></body></html>";

file_put_contents('c:/Users/USER/Herd/simpultemu_kami/scratch/compare_ground.html', $html);
echo "Written to scratch/compare_ground.html\n";
