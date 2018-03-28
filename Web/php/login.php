<?php
//if($ingelogd){
//    header("Location: ?page=home");
//}



    if(isset($_POST['submit'])){
		$algo = "sha256";
		$spass = 
		$hpass = hash($algo , $_POST['pass']);
		$password = $hpass;
        $username = $_POST['uname'];
		if(empty($username) && empty($username))
		{
			echo "gebruikersnaam en wachtwoord ontbreken<br />";
		}
		else
		{
			if(empty($username)){
				echo "Voer gebruikersnaam in<br />";
			}else if(empty($password)){
				echo "Voer wachtwoord in<br />";
			}else{
				$query = "SELECT * FROM persoon WHERE Email =:email";
				$parameters = array(
					':email' => $username
				);
				try
				{
					$stmt = $con->prepare($query);
					$stmt->execute($parameters);
				}
				catch(PDOException $ex)
				{
					echo $ex;
				}
				$gebruikerRij = $stmt->fetch();
				if($gebruikerRij){
					if($gebruikerRij['Wachtwoord']== $rpass = hash($algo , $_POST['pass'] + $gebruikerRij['salt']))
					{
						unset($gebruikerRij['password']);
						$_SESSION['user'] = $gebruikerRij;
						header('location: index.php?page=adminmenu');
					}
					else
					{
						echo "Wachtwoord fout";
					}
					
				}
				else
				{
					echo "gebruikersnaam niet herkend";
				}
			}
		}

        

    }

?>