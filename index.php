<!DOCTYPE html>
<html>
<head>
	<title>Mahlzeit am Meer - Virtueller Rundgang</title>
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<link href="infospot/infospot.css" rel="stylesheet" />
	<style>
		@-ms-viewport { width: device-width; }
		@media only screen and (min-device-width: 800px) { html { overflow:hidden; } }
		html { height:100%; }
		body { height:100%; overflow:hidden; margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; 
			font-size:16px; color:#FFFFFF; background-color:#000000; }
	</style>
</head>
<body>

<?php

	$tour = empty($_REQUEST['tour']) ? 'cyvt' : basename($_REQUEST['tour']);

	// Auto-authenticate as admin - no login required
	session_start();
	$_SESSION['user'] = 'admin';
	$_SESSION['pass'] = 'auto';
	$_SESSION['timeout'] = time() + 24 * 60 * 60; // 24 hours session
	$auth = true;

	// If tour parameter is 'private', use private.xml, otherwise use cyvt.xml
	if ($tour == 'private') {
		$tour = 'private';
	} else {
		$tour = 'cyvt';
	}

	if ($tour == 'cyvt' || $auth) {

?>

<script src="tour.js"></script>
<script src="cyvt.js"></script>

<div id="pano" style="width:100%;height:100%;">
	<noscript>
		<table style="width:100%;height:100%;">
			<tr style="valign:middle;">
				<td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td>
			</tr>
		</table>
	</noscript>
	<script>
	embedpano({ swf:"tour.swf", xml:"<?= $tour ?>.xml", target:"pano", html5:"prefer", passQueryParameters:true });
	</script>
</div>

<img src="infospot/close.png" id="infospot_close" onclick="hidelayer()">
<div id="infospot_preview"></div>

<?php } else { ?>

<div style="width:50%;margin:0 auto;margin-top:100px;">
<strong>Mahlzeit am Meer - Virtual Tour</strong><br><br>
<p>Tour wird geladen...</p>
</div>

<?php } ?>

</body>
</html>
