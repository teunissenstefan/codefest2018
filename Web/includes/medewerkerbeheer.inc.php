<?php
	if (isset($_SESSION['loggedIn'])) {
	echo "<a href='?page=adminmenu'><button>&#9668;Terug</button></a> ";
	echo "<a href='?page=medewerkerbeheer&add=true'><button>Toevoegen</button></a> ";
	echo "<a href='?page=medewerkerbeheer'><button>Ververs</button></a>";
?>
<div class='row rowHeader'>
	<div class='col s12 l2'>
		Naam
	</div>
	<div class='col s12 l3'>
		E-mail
	</div>
	<div class='col s12 l3'>
		Adress
	</div>
	<div class='col s12 l2'>	
		Acties
	</div>
</div>
<?php
		foreach($users as $user) {
			?>
			<div class='row'>
				<div class='col s12 l2'>
					<?php echo $user[1]; echo "  "; echo $user[2]; ?>
				</div>
				<div class='col s12 l3'>
					<?php echo $user[3]; ?>
				</div>
				<div class='col s12 l3'>
					<?php echo $user[6]; ?>
				</div>
				<div class='col s12 l2'>
					<a href='?page=medewerkerbeheer&edit=false&uid=<?php echo $user[0]; ?>'>
						Bekijk
					</a> / 
					<a href='?page=medewerkerbeheer&edit=true&uid=<?php echo $user[0]; ?>'>
						Bewerk
					</a> / 
					<a href='?page=medewerkerbeheer&delete=true&uid=<?php echo $user[0]; ?>'>
						Verwijder
					</a>
				</div>
			</div>
			<?php
		}
		if(isset ($_GET['edit'])) {
			if (isset ($_GET['uid']) && $_GET['edit'] == "false") {
				include ("includes/viewuser.inc.php");
			}
			else {
				include ("includes/edituser.inc.php");
			}
		}
		elseif (isset ($_GET['add'])) {
			if ($_GET['add'] == "true") {
				include ("includes/adduser.inc.php");
			}
		}
		elseif (isset ($_GET['delete'])) {
			if ($_GET['delete'] == "true") {
				include ("php/deleteuser.php");
			}
		}
	}
	else {
		header('Location: ?page=login');
	}
?>