<?php

$rolQuery = " 
    SELECT 
        *
    FROM persoon_rol
";
try 
{ 
    $stmt = $con->prepare($rolQuery); 
    $stmt->execute(); 
} 
catch(PDOException $ex) 
{ 
die("Failed to run query (2)"); 
}
$rollen = $stmt->fetchAll(PDO::FETCH_ASSOC); 

	try {
		$sth = $con->prepare("SELECT * FROM persoon"); 
		$sth->execute();
	}
	catch(PDOException $ex){
		echo $ex;
	}
	$users = $sth->fetchAll();
	
	if(isset ($_GET['uid']) && isset ($_GET['edit'])) {
		try {
			$sth = $con->prepare("SELECT * FROM persoon WHERE Pers_id = :uid"); 
			$sth->bindParam(":uid", $_GET['uid']);
			$sth->execute();
		}
		catch(PDOException $ex){
			echo $ex;
		}
		$userg = $sth->fetch();
	}
?>