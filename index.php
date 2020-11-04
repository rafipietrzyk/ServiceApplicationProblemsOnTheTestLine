<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Strona glówna</title>

	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2 align="center">Troubleshooting</h2>
</br>
</br>
<font color="red"> <b> UWAGA !!! </b> </font>
</br>
</br>
<font color="red"> <b> PRZED WYSLANIEM ZGLOSZENIA DO PE, ZAPOZNAJ SIE Z ZAMIESZCZONYMI PONIZEJ INSTRUKCJAMI !!! </b> </font>


</br>
</br>
</br>

<B>W czym mozemy pomóc ?</B></p>
<a href="PDF/audioloop.pdf">Problem z testem audioloop?</a></p>
<a href="PDF/WLAN.pdf">Problem z testem WLAN?</a></p>
<a href="PDF/KARTA SD.pdf">Problem z testem karty SD?</a></p>
<a href="PDF/Lan.pdf">Problem z testem LAN?</a></p>
<a href="PDF/Ram.pdf">Problem z testem RAM?</a></p>
<a href="PDF/Kamera.pdf">Problem z testem Kamery?</a></p>
<a href="PDF/DVD.pdf">Problem z testem DVD?</a></p>

</br>
</br>

</body>
</html>

<?php 

$formularz_dodaj_uzytkownika = '

<table border=1>
  <tr>
    <td align=center>Zapisz się na listę PE</td>
  </tr>
  <tr>
    <td>
      <table>

<FORM method="POST" action="">



<tr>        
          <td>Imie:</td>
          <td>
            <input type="text" name="imie" 
			size="60"  placeholder="Wpisz swoje imie bez polskich znakow" required="required" pattern="^[a-zA-Z]{3,}$">
          </td>
        </tr>
<tr>        
          <td>Nazwisko:</td>
          <td>
            <input type="text" name="nazwisko"
			size="60" placeholder="Wpisz swoje nazwisko bez polskich znakow" required="required" pattern="^[a-zA-Z]{3,}$">
          </td>
        </tr>
<tr>        
          <td>ID operatora:</td>
          <td>
            <input type="text" name="id"
			size="60" placeholder="Wpisz swoje ID" required="required" pattern="^[0-9a-zA-Z]{4,}$">
          </td>
        </tr>
<tr>        
          <td>Klient:</td>
          <td>
          <select name="klient" required="required">
		<option></option>  
		<option>A31</option>
		<option>A39</option>
		<option>C38</option>
		<option>RPL</option>
		<option>QA</option>
	</select>
          </td>
        </tr>
		
<tr>        
          <td>Model:</td>
          <td>
            <input type="text" name="model"
			size="60" placeholder="Wpisz nazwe modelu ktory testujesz" required="required" pattern="^[0-9a-zA-Z]{5,}$">
          </td>
        </tr>

<tr>        
          <td>Stanowisko:</td>
          <td>
            <input type="text" name="stanowisko"
			size="60" placeholder="Wpisz nazwe stanowiska na ktorym siedzisz" required="required" pattern="^[0-9a-zA-Z]{3,}$">
          </td>
        </tr>
        </tr>		
<tr>        
          <td>Problem:</td>
          <td>
            <input type="text" name="problem"
			size="60" placeholder="Opisz problem ktory chcesz zglosic do dzialu PE" required="required">
          </td>
        </tr>
  </table>
    </td>
  </tr>
</table>
<tr>
</br>
            <input type="image" src="buttons/send_1.png">
          </td>
        </tr>
</FORM>

';

 include "config.php";

if ( isset($_POST["id"]) ){

   SkorygujZmienneZFormularza($id,$imie,$nazwisko,$problem,$klient,$model,$stanowisko);

  $czy_poprawne_dane = SprawdzPoprawnoscDanych ($id,$imie,$nazwisko,$problem,$klient,$model,$stanowisko);
   if ($czy_poprawne_dane == "dane_ok") {
     $zapytanie = "INSERT INTO lista (lp,klient,model,stanowisko,id,imie,nazwisko,problem,data_p) ";
      $zapytanie .= "VALUES (default, '$klient', '$model', '$stanowisko', '$id','$imie','$nazwisko','$problem', now())";

      $wynik_zapytania = mysql_query($zapytanie);

      if (!$wynik_zapytania) {

         echo("<br />Nie mogę dodac rekordu do bazy!<br /><br />");
      } else {

				 echo "<br />Komunikat został wysłany do działu PE...";
				  echo "<br /><br /><a href=\"index.php\"><img src=\"buttons/back_1.png\" alt=\"nie mozna wyswietlic obrazka\" /></a>";
      }
   } else {

      echo "<font color='red'>Wprowadziłes niepoprawne dane do formularza. Być może nie wszystkie pola zostały wypełnione...</font>";
      echo "<font color='red'><br />Spróbuj ponownie:</font>";
      echo $formularz_dodaj_uzytkownika;
   }
} else {

   echo "";
   echo $formularz_dodaj_uzytkownika;
}

if ( !mysql_close() ) {
   echo 'Nie moge zakonczyć połączenia z bazą danych';
   exit (0);
}

function SkorygujZmienneZFormularza($id,$imie,$nazwisko,$problem,$klient,$model,$stanowisko) {
if ( isset($_POST["id"]) )
   $id = trim($_POST["id"]);
else
   $id = "";
if ( isset($_POST["imie"]) )
   $imie = trim($_POST["imie"]);
else
   $imie = "";
if ( isset($_POST["nazwisko"]) )
   $nazwisko = trim($_POST["nazwisko"]);
else
   $nazwisko = "";
if ( isset($_POST["problem"]) )
   $problem = trim($_POST["problem"]);
else
   $problem = "";
if ( isset($_POST["klient"]) )
   $klient = trim($_POST["klient"]);
else
   $klient = "";
if ( isset($_POST["model"]) )
   $model = trim($_POST["model"]);
else
   $model = "";
if ( isset($_POST["stanowisko"]) )
   $stanowisko = trim($_POST["stanowisko"]);
else
   $stanowisko = "";
}

function SprawdzPoprawnoscDanych ($id,$imie,$nazwisko,$problem,$klient,$model,$stanowisko) {
 if ( ($id=="") ||($imie=="") || ($nazwisko=="") || ($problem=="") || ($klient=="")|| ($model=="")|| ($stanowisko==""))
    return "złe_dane";
 return "dane_ok";
}
?>
</body> 
</html>

<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>
