<?php

$file = !empty($_GET['file']) ? basename($_GET['file']) : '';

if ($file && file_exists($file) && is_readable($file)) {
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=$file");
	header("Content-Type: image/png");

	readfile(basename($file);
}
else {
	header("HTTP/1.0 404 Not Found");
}
