<?php
	$sth = $con->prepare("SELECT * FROM persoon"); 
	$sth->execute();
	$users = $sth->fetchAll();
?>