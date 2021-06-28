<?php
    session_start();
    $_SESSION['sess_usr_id'] = "";
    $_SESSION['sess_name'] = "";
    if(empty($_SESSION['sess_usr_id'])){
    	if (!empty($_SERVER['HTTP_REFERER']))
    		header("Location: ".$_SERVER['HTTP_REFERER']);
		else
   			header("Location: index.php");
   	}
?>

