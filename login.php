<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta name="Author" content="Rafał Pietrzyk - PE" />
	<title>Logowanie</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2 align="center">Troubleshooting</h2>

</body>
</html>


<?php
 
    session_start();
    
    include "config.php";
 
    $user_login = $_POST['login'];
    $user_pass  = $_POST['pass'];
    
    $sql = "SELECT * FROM user WHERE user_name = '".$user_login."' AND user_pass = '".$user_pass."';";
    $result = mysql_query($sql)
        or die("Podałeś błędny login lub hasło");
        
    $rows = mysql_num_rows($result);
    
    if ($rows == 1) {
        
        $r = mysql_fetch_assoc($result);
        session_register("user_id");
        session_register("user_name");
        
        $_SESSION['user_id']     = $r['user_id'];
        $_SESSION['user_name']   = $r['user_name'];
        
        header("Location: admin.php");
    }
    else {
        echo "Podałeś błędny login lub hasło... <br><br>
	<a href=\"admin.php\"><img src=\"buttons/back_1.png\" alt=\"nie mozna wyswietlic obrazka\" /></a>";
    }
 
?>
<article>	
	<footer> <br />
		Created by: <address>Rafał Pietrzyk - PE </address>		
	</footer>
</article>