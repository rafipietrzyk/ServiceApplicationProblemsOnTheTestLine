<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Zakoncz</title>

	<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<h2 align="center">Troubleshooting</h2>

</body>
</html>

<body>
<table border=1>
  <tr>
    <td align=center>Edytuj dane</td>
  </tr>
  <tr>
    <td>
      <table>
      <?
     include "config.php";
      $zapytanie = "SELECT * FROM lista where lp='$lp'";
      $wynik = mysql_query($zapytanie);
      $row = mysql_fetch_array($wynik);
      ?>
      <form method="post" action="zakoncz_data.php">
      <input type="hidden" name="lp" value="<? echo "$row[lp]"?>">
        <tr>        
          <td>Komentarz</td>
          <td>
            <input type="text" required="required" name="komentarz"
			size="60" value="<? echo "$row[komentarz]"?>">
          </td>
        </tr>
        
        <tr>
		<td>Zmiana:</td>
          <td>
            <select name="zmiana" required="required">
		<option></option>
		<option>Adam</option>
		<option>Mateusz</option>
	</select>
          </td>
        </tr>
        <tr>
		<td>Błąd:</td>
          <td>
            <select name="blad" required="required">
		<option></option>
		<option>QC1</option>
		<option>parts</option>
		<option>operator</option>
		<option>motherboard fail</option>
		<option>add PN MAC FRU</option>
		<option>software</option>
		<option>training</option>
		<option>server</option>
		<option>RPL</option>
		<option>BGA</option>
	</select>
          </td>
        </tr>
        </table>
    </td>
  </tr>
</table>
<tr>
</br>
            <input type="image" src="buttons/save_1.png">
          </td>
        </tr>
</FORM>
</body>
</html>

<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>