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
		$pass = $passhas = hash($algo , $_POST['pass'] + $salt);

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $salt = '';
            for ($i = 0; $i < $length; $i++) {
                $salt .= $characters[rand(0, $charactersLength - 1)];
            }
        }
        $sth = $con->prepare("INSERT INTO persoon(Pers_Id, Voornaam, Achternaam, Email, Wachtwoord, Salt, Adres, Postcode, Plaats, Land, Uren_per_week, Loon) VALUES (:voornaam,:achternaam,:email,:wachtwoord,:salt,:adres,:postcode,:plaats,:land,:uren_per_week,:loon)");
        $sth->bindParam(":voornaam", $fname);
        $sth->bindParam(":achternaam", $lname);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":salt", $salt);
        $sth->bindParam(":adres", $adres);
        $sth->bindParam(":post", $post);
        $sth->bindParam(":city", $city);
        $sth->bindParam(":land", $land);
        $sth->bindParam(":uren_per_week", $upw);
        $sth->bindParam(":loon", $loon);
        $sth->execute();
    }
?>