<form class='row' action="php/adduser.php">
    <div class='col s12 l2'>
		<ul>
			<li><img src="images/profile.png" width="240px" height="200px"></i>
			<li><b>Username/E-mail:</b></li>
			<li><input type="text" name="email" placeholder="<?php echo $user[3]; ?>"></li>
			<li><b>Password:</b></li>
			<li><input type="text" name="password" placeholder="<?php echo $user[4]; ?>"></li>
		</ul>
	</div>
	<div class='col s12 l2'>
		<ul style="margin-left: 45px;">
			<li><b>Naam:</b></li>
			<li><input type="text" name="naam" placeholder="<?php echo $user[1]; echo "  "; echo $user[2]; ?>"></li>
			<li><b>Adress:</b></li>
			<li><input type="text" name="adress" placeholder="<?php echo $user[6]; ?>"></li>
			<li><b>Woonplaats:</b></li>
			<li><input type="text" name="woonplaats" placeholder="<?php echo $user[9]; ?>"></li>
			<li><b>Uren:</b></li>
			<li><input type="text" name="uren" placeholder="<?php echo $user[10]; ?>"></li>
			<li><b>Loon:</b></li>
			<li><input type="text" name="loon" placeholder="<?php echo $user[11]; ?>"></li>
			<li><input type="submit" value="edit"></li>
		</ul>
	</div>
</form>