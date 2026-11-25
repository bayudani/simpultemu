<?php

$imU = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/scratch/car_from_user_screenshot.png');
$im5 = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/scratch/car_from_5aff.png');

// Are the pixels of the car identical?
// In 5aff, the car is painted in watercolor.
// In car_from_user_screenshot, let's see if it's the exact same watercolor car.
echo 'User screenshot car width: '.imagesx($imU).', 5aff car width: '.imagesx($im5)."\n";
