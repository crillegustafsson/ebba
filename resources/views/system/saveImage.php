<?php
/*	$data = substr($_POST['imageData'], strpos($_POST['imageData'], ",") + 1);
	$decodedData = base64_decode($data);
	$fp = fopen("canvas.png", 'wb');
	fwrite($fp, $decodedData);
	fclose();
	echo "/canvas.png";*/
$data = $_POST['data'];
$file = md5(uniqid()) . '.png';

// remove "data:image/png;base64,"
$uri =  substr($data,strpos($data,",") 1);

// save to file
file_put_contents($file, base64_decode($uri));

// return the filename
echo json_encode($file);


?>

