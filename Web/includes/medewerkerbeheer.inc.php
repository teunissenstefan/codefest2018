<br>
<br>
<div class='col s12 l2' style="float: right;">
	<a href='?page=medewerkerbeheer&edit=true'>
		<img src='images/circel.png' width='40px'>
	</a>
</div>
<?php
	foreach($users as $user) {
		?>
		<div class='row rowHeader'>
            <div class='col s12 l2'>
				<?php echo $user[1]; echo "  "; echo $user[2]; ?></div>
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
?>