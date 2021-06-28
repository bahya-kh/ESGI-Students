<?php

try{
	$bdd = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');
}

catch (Exception $e){
    die('Erreur cnx to db: ' . $e->getMessage());
}

?>