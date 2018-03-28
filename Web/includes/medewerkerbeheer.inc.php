<?php
	include "php/medewerkerbeheer.php";
?>
<br>
<br>
<?php
	foreach($users as $user) {
		?>
		<div class='row rowHeader'>
            <div class='col s2'>
				<?php echo $user[1]; echo " "; echo $user[2]; ?></div>
            <div class='col s3'>
				<?php echo $user[3]; ?>
			</div>
            <div class='col s3'>
				<?php echo $user[6]; ?>
			</div>
            <div class='col s2'>
				<a href='?page=viewuser&uid=<?php echo $user[0]; ?>'>
					<img src='images/dash.png' width='40px' heigth='40px'>
				</a>
			</div>
            <div class='col s2'>
				<a href='?page=edituser&uid=<?php echo $user[0]; ?>'>
					<img src='images/circel.png' width='40px' heigth='40px'>
				</a>
			</div>
        </div>
		<?php
	}
?>