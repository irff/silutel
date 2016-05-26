<?php 

# SETUP INI DULU

$host = "localhost"; 
$user = "pgadmin"; 
$pass = "pgadmin"; 
$db = "irfan"; 

$db_con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

$query = "SELECT VERSION()"; 
$rs = pg_query($db_con, $query) or die("Cannot execute query: $query\n"); 
$row = pg_fetch_row($rs);


?>
