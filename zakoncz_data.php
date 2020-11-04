<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Edycja</title>
</head>
<body>
<h2 align="center">Troubleshooting</h2>

</body>
</html>

<?
include "config.php";
$order = "UPDATE lista 
          SET komentarz='$komentarz', 
			  zmiana='$zmiana',
			  blad='$blad',
			  status='zakonczono',			 
			  data_z=now()
          WHERE 
	      lp='$lp'";
mysql_query($order);
header("location:admin.php");
?>

<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>