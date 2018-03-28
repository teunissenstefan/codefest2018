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
				header("Location: ?page=adminmenu");
				$_SESSION['loggedIn'] = $username;
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
