<?php
$connect_error = "There has been a connection error, please try again later";
$DB_user = "root";
$DB_pass = "";
try
{
    $con = new PDO("mysql:host=localhost;dbname=infocaster",$DB_user,$DB_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
