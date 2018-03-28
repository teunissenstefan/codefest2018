<?php
    if (isset($_SESSION['loggedIn'])) {
    } 
        

        if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		
		$sth = $con->prepare("SELECT * FROM persoon WHERE Email = :username"); 
		$sth->bindParam(':username', $username);
		$sth->execute();
		$row = $sth->fetch();
		if ($row) {
			if (password_verify($_POST['password'], $row['Wachtwoord'])) {
				$_SESSION['loggedIn'] = $username;
			}else{
				header($page = "login");
				echo("<div class='login_error'>Password is incorrect</div>");
			}
		} else {
			header($page = "login");
			echo("<div class='login_error'>Username is incorrect or user does not exist</div>");
		}
    }
?>
