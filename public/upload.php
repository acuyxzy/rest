<?php
error_reporting(0);
header("Content-Type: application/json");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// header('Content-type: text/javascript');
if($_FILES) {
	$file = $_FILES['berkas']['name'];
	$upload_extension =  explode('.', $file);
	$upload_extension = end($upload_extension);
if($upload_extension == 'php' && $upload_extension == 'php5' && $upload_extension == 'txt') {
	$data = [ 'message' => 'Invalid extension!' ];
	print_r(json_encode(['Creator' => '@neoxrs - Wildan Izzudin', 'status' => false, 'result' => $data ], JSON_PRETTY_PRINT));
} else {
	$name = strtolower(str_replace(' ', '-', $file));
	$tmp = $_FILES['berkas']['tmp_name'];
	if ($file == 'files.json' || $file == 'lists.json' || $file == 'database.json') {
		$dir = "";
	} else {
		$dir = "files/";
	}
	$upload = move_uploaded_file($tmp, $dir.$name);
	if ($upload) {
		$data = [ 'message' => 'File uploaded!',  'name' => $name, 'link' => 'https://arachuviral.000webhostapp.com/'.$dir.$file ];
		print_r(json_encode(['Creator' => '@neoxrs - Wildan Izzudin', 'status' => true, 'result' => $data ], JSON_PRETTY_PRINT));
	} else {	
		$data = [ 'message' => 'Upload failed!' ];
		print_r(json_encode(['Creator' => '@neoxrs - Wildan Izzudin', 'status' => false, 'result' => $data ], JSON_PRETTY_PRINT));
		}
	}
} else {
       $data = [ 'message' => 'File not found!' ];
       print_r(json_encode(['Creator' => '@neoxrs - Wildan Izzudin', 'status' => false, 'result' => $data ], JSON_PRETTY_PRINT));
} 
if($_GET['del']) return unlink($_GET['del']);
?>

