<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $adres = $_POST['adr'];
        $post = $_POST['post'];
        $city = $_POST['city'];
        $land = $_POST['land'];
        $upw = $_POST['upw'];
        $loon = $_POST['loon'];
		$pass = $_POST['pass'];
		$rol = $_POST['rol_id'];
		$hashpws = password_hash($pass, PASSWORD_DEFAULT);

        $sth = $con->prepare("INSERT INTO persoon (Voornaam, Achternaam, Email, Wachtwoord, Adres, Postcode, Plaats, Land, Uren_per_week, Loon, Rol_Id) VALUES (:voornaam,:achternaam,:email,:wachtwoord,:adres,:postcode,:city,:land,:uren_per_week,:loon,:rol_id)");
        $sth->bindParam(":voornaam", $fname);
        $sth->bindParam(":achternaam", $lname);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":wachtwoord", $hashpws);
        $sth->bindParam(":adres", $adres);
        $sth->bindParam(":postcode", $post);
        $sth->bindParam(":city", $city);
        $sth->bindParam(":land", $land);
        $sth->bindParam(":uren_per_week", $upw);
        $sth->bindParam(":loon", $loon);
        $sth->bindParam(":rol_id", $rol);
        $sth->execute();
		header("Location: ?page=medewerkerbeheer");
    }
?>