<?php
$json_sig_data = $_POST['output'];
file_put_contents('json_sig_data.txt', $json_sig_data);
header('Location: ' . $_SERVER['HTTP_REFERER']);


require_once 'signature-to-image.php';

$json = $_POST['output'];
$img = sigJsonToImage($json, array('imageSize'=>array(275, 90)));

imagepng($img, 'signature.png');
imagedestroy($img); 
?>