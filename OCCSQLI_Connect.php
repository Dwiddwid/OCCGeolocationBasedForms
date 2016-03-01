<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OCCSQLI_Connect</title>
</head>
<?php 
DEFINE ('DB_USER', 'Connect_Admin');
DEFINE ('DB_PASSWORD', 'QWeRTymd5180');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'occ_local');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' .
	mysqli_connect_error());
?>
<body>
</body>
</html>