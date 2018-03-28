<?php
	try {
		$sth = $con->prepare("SELECT * FROM persoon"); 
		$sth->execute();
		$users = $sth->fetchAll();
	}
	catch(PDOException $ex){
				echo $ex;
	}
	
	if(isset ($_GET['uid']) && isset ($_GET['edit'])) {
		try {
			$sth = $con->prepare("SELECT * FROM persoon WHERE Pers_id = :uid"); 
			$sth->bindParam("uid", $_GET['uid']);
			$sth->execute();
			$user = $sth->fetch();		
		}
		catch(PDOException $ex){
			echo $ex;
		}
	}
?>