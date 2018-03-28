<?php
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
		$hashpws = password_hash($pass, PASSWORD_DEFAULT);

        $sth = $con->prepare("UPDATE persoon SET Voornaam = :voornaam, Achternaam = :achternaam, Email = :email, Wachtwoord = :wachtwoord, Adres = :adres, Postcode = :postcode, Plaats = :city, Land = :land, Uren_per_week = :uren_per_week, Loon = :loon WHERE Pers_Id = :uid");
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
        $sth->bindParam(":uid", $_GET['uid']);
        $sth->execute();
		header("Location: ?page=medewerkerbeheer");
    }
?>