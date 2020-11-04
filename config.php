
<?php
 
    session_start();
 
    $db_host = "localhost";
    $db_user = "pe";
    $db_password = "pecontrol";
    $db_base = "dane_pe";
    
    $db = mysql_connect($db_host, $db_user,$db_password);
    mysql_select_db($db_base, $db);
    
    if (isset($_SESSION['user_id'])) {
        $user_id     = $_SESSION['user_id'];
        $user_name   = $_SESSION['user_name'];
    }
 
?>