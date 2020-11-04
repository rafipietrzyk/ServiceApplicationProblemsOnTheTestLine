<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Excel</title>
	<meta http-equiv="Refresh" content="30" />
 	<link rel="stylesheet" type="text/css" href="style.css" />


</head>
<body>
<h2 align="center">Troubleshooting</h2>

</body>
</html>



<?php
 
    session_start();
    
    include "config.php";
    
    if (isset($_SESSION['user_id'])) {
        echo "Zalogowałeś się jako: <b>".$user_name."</b><br />";

 $zapytanie = "SELECT * FROM lista order by lp desc;";

 $wynik = mysql_query($zapytanie);
 

 echo "<a href=\"logout.php\">[WYLOGUJ]</a>";
  echo "   ";
  echo "<a href=\"calosc.php\">[POWRÓT]</a>";
  echo "   ";
  echo "<a href=\"plik.php\">[GENERUJ PLIK]</a>";

 echo "<p>";
 echo "<table bordercolor=\"453464\"><tr>";
 echo "<td bgcolor=\"66c66\"><strong>Lp</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Klient</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Model</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Stanowisko</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>ID</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Imie</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Nazwisko</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Problem</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Data_P</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Komentarz</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Pracownik</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Zmiana</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Błąd</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Status</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Data_R</strong></td>";
 echo "<td bgcolor=\"66c66\"><strong>Data_Z</strong></td>";
 
 //echo "<td bgcolor=\"66c66\"><strong>Start</strong></td>";
 //echo "<td bgcolor=\"66c66\"><strong>Stop</strong></td>";
 echo "</tr>";
 
    while ($row=mysql_fetch_array($wynik)){
        echo ("<tr><td bgcolor=\"ff9933\">$row[lp]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[klient]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[model]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[stanowisko]</td>");
        echo ("<td bgcolor=\"ff9933\">$row[id]</td>");
        echo ("<td bgcolor=\"ff9933\">$row[imie]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[nazwisko]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[problem]</td>");
		echo ("<td bgcolor=\"ff9933\">$row[data_p]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[komentarz]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[pracownik]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[zmiana]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[blad]</td>");
		echo ("<td bgcolor=\"66ccff\">$row[status]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[data_r]</td>");
		echo ("<td bgcolor=\"9999ff\">$row[data_z]</td>");
		
        //echo ("<td bgcolor=\"9999ff\"><a href=\"rozpocznij.php?lp=$row[lp]\"><button>Rozpocznij</button></a></td>");
		//echo ("<td bgcolor=\"9999ff\"><a href=\"zakoncz.php?lp=$row[lp]\"><button>Zakończ</button></a></td></tr>");
 }
 echo "</table>";

		     
    }
    else {
        echo "<b>Podaj login i hasło:</b>";
        echo "<form method=\"POST\" action=\"login.php\">
                Login:<input type=\"text\" name=\"login\"><br>
                Hasło:<input type=\"password\" name=\"pass\"><br>
                <input type=\"submit\" name=\"log\" value=\"Zaloguj\">
              </form>";         
    }
            
?>
<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>