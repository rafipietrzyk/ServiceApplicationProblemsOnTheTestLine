<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Wylogowano</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2 align="center">Troubleshooting</h2>

</body>
</html>

<?php
 
    session_start();
    session_destroy();
    
    header("Location: admin.php");
 
?>

<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>
