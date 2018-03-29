<?php
    if (isset($_SESSION['loggedIn'])) {
		header("Location: ?page=adminmenu");
    } 
        elseif (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		
		$sth = $con->prepare("SELECT * FROM persoon WHERE Email = :username"); 
		$sth->bindParam(':username', $username);
		$sth->execute();
		$row = $sth->fetch();
		if ($row) {
			if (password_verify($_POST['password'], $row['Wachtwoord'])) {

				$rolQuery = " 
					SELECT 
						*
					FROM persoon_rol
					WHERE Rol_Id=:Rol_Id
				";
				try 
				{ 
					$stmt = $con->prepare($rolQuery); 
					$stmt->bindParam(":Rol_Id", $row['Rol_Id']);
					$stmt->execute(); 
				} 
				catch(PDOException $ex) 
				{ 
				die("Failed to run query (2)"); 
				}
				$rol = $stmt->fetch(PDO::FETCH_ASSOC); 

				$_SESSION['loggedIn'] = $username;
				$_SESSION['id'] = $row['Pers_Id'];
				$_SESSION['rol'] = $rol['Rol'];

				header("Location: ?page=adminmenu");
			}else{
				header($page = "login");
				echo("Password is incorrect");
			}
		} else {
			header($page = "login");
			echo("Username is incorrect or user does not exist");
		}
    }
?>