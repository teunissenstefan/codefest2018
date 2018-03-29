<form class='row' action="?page=edituser&uid=<?php echo $userg[0]; ?>" method="Post">
    <div class='col s12 l2'>
		<ul>
			<li><img src="images/profile.png" width="240px" height="200px"></i>
			<li><b>Username/E-mail:</b></li>
			<li><input type="text" name="email" placeholder="<?php echo $userg[3]; ?>"></li>
			<li><b>Password:</b></li>
			<li><input type="text" name="pass" placeholder="<?php echo $userg[4]; ?>"></li>
			<li><b>Voornaam:</b></li>
			<li><input type="text" name="fname" placeholder="<?php echo $userg[1]; ?>"></li>
			<li><b>Achternaam:</b></li>
			<li><input type="text" name="lname" placeholder="<?php echo $userg[2];; ?>"></li>
		</ul>
	</div>
	<div class='col s12 l2'>
		<ul style="margin-left: 45px;">
			<li><b>Postcode:</b></li>
			<li><input type="text" name="post" placeholder="<?php echo $userg[7]; ?>"></li>
			<li><b>Adress:</b></li>
			<li><input type="text" name="adr" placeholder="<?php echo $userg[6]; ?>"></li>
			<li><b>Land:</b></li>
			<li><input type="text" name="land" placeholder="<?php echo $userg[9]; ?>">
			</li><li><b>Woonplaats:</b></li>
			<li><input type="text" name="city" placeholder="<?php echo $userg[8]; ?>"></li>
			<li><b>Uren:</b></li>
			<li><input type="text" name="upw" placeholder="<?php echo $userg[10]; ?>"></li>
			<li><b>Rol:</b></li>
			<li>
				<select name="rol_id">
				<?php
					foreach($rollen as $rol){
						echo "<option value='".$rol['Rol_Id']."' ";
						if($userg['Rol_Id']==$rol['Rol_Id']){
							echo "selected";
						}
						echo ">".$rol['Rol']."</option>";
					}
				?>
				</select>
			</li>
			<li><b>Loon:</b></li>
			<li><input type="text" name="loon" placeholder="<?php echo $userg[11]; ?>"></li>
			<li><input type="submit" name="submit" value="edit"></li>
		</ul>
	</div>
</form>
