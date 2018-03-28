<table>
	<tr>
		<th>Naam</th>
		<th>E-Mail</th>
		<th>Username</th>
	</tr>
<?php
	foreach($users as $user) {
		echo "<tr>";
		echo "<td>".$user."</td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";
	}
?>
</table>