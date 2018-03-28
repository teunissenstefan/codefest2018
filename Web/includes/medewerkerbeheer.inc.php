<?php
	if (isset($_SESSION['loggedIn'])) {
?>
<br>
<br>
<div class='row rowHeader'>
	<div class='col s12 l2'>
		Naam
	</div>
	<div class='col s12 l2'>
		E-mail
	</div>
	<div class='col s12 l2'>
		Adress
	</div>
	<div class='col s12 l2' style="float: right;">	
		<a href='?page=medewerkerbeheer&edit=true'>
			<h5>+</h5>
		</a>
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
						<img src='images/dash.png' width='40px'>
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
	}
	else {
		header('Location: ?page=login');
	}
?>