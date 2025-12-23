<?php
$data = $_POST["img"];
$data = str_replace("data:image/png;base64,","",$data);
$data = base64_decode($data);

$dir = "edited/";
if(!is_dir($dir)) mkdir($dir);

$file = $dir.time().".png";
file_put_contents($file,$data);

echo "Image saved successfully";
