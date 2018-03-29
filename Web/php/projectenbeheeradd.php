<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}

$personenQuery = " 
    SELECT 
        *
    FROM persoon
";
try 
{ 
    $stmt = $con->prepare($personenQuery); 
    $stmt->execute(); 
} 
catch(PDOException $ex) 
{ 
    die("Failed to run query (4)"); 
}
$personen = $stmt->fetchAll(PDO::FETCH_ASSOC);  

$post_owner_id = "";
$post_project_naam = "";
$post_organisatie = "";
$post_telefoonnummer = "";
$post_email = "";
$post_startdatum = "";
$post_deadline = "";
$post_prijs = "";
$failed = false;
if(isset($_POST['submit'])){
    $errorMsg = "Los de volgende problemen op:";

    if($_POST['prijs']==0 || !empty($_POST['prijs'])){
        $post_prijs = $_POST['prijs'];
    }else{
        $errorMsg.= "<br/>Vul de gewenste prijs in";
        $failed = true;
    }

    if(!empty($_POST['project_naam'])){
        $post_project_naam = $_POST['project_naam'];
    }else{
        $errorMsg.= "<br/>Vul de project naam in";
        $failed = true;
    }

    if(!empty($_POST['organisatie'])){
        $post_organisatie = $_POST['organisatie'];
    }else{
        $errorMsg.= "<br/>Vul de organisatie in";
        $failed = true;
    }

    if(!empty($_POST['organisatie'])){
        $post_organisatie = $_POST['organisatie'];
    }else{
        $errorMsg.= "<br/>Vul de organisatie in";
        $failed = true;
    }

    if(!empty($_POST['telefoonnummer'])){
        $post_phone = $_POST['telefoonnummer'];
    }else{
        $errorMsg.= "<br/>Vul de telefoonnummer in";
        $failed = true;
    }

    if(!empty($_POST['telefoonnummer'])){
        $post_telefoonnummer = $_POST['telefoonnummer'];
    }else{
        $errorMsg.= "<br/>Vul het telefoonnummer in";
        $failed = true;
    }

    if(!empty($_POST['email'])){
        $post_email = $_POST['email'];
    }else{
        $errorMsg.= "<br/>Vul het e-mail adres in";
        $failed = true;
    }

    if(!empty($_POST['startdatum'])){
        $post_startdatum = $_POST['startdatum'];
    }else{
        $errorMsg.= "<br/>Vul de startdatum in";
        $failed = true;
    }

    if(!empty($_POST['deadline'])){
        $post_deadline = $_POST['deadline'];
    }else{
        $errorMsg.= "<br/>Vul de deadline in";
        $failed = true;
    }

    $post_owner_id = $_POST['owner_id'];

    if($failed == false){
        //de query
        $query = " 
            INSERT INTO project
            (Naam,Owner,Organization,Phone,Email,Startdatum,Deadline,Prijs)
            VALUES (:Naam,:Owner,:Organization,:Phone,:Email,:Startdatum,:Deadline,:Prijs)
        ";
        try 
        { 
            $stmt = $con->prepare($query); 
            $stmt->bindParam(':Naam', $post_project_naam);
            $stmt->bindParam(':Owner', $post_owner_id);
            $stmt->bindParam(':Organization', $post_organisatie);
            $stmt->bindParam(':Phone', $post_phone);
            $stmt->bindParam(':Email', $post_email);
            $stmt->bindParam(':Startdatum', $post_startdatum);
            $stmt->bindParam(':Deadline', $post_deadline);
            $stmt->bindParam(':Prijs', $post_prijs);
            $stmt->execute();
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (1)".$ex); 
        } 
        if($stmt->rowCount()!=1){
            $errorMsg.= "Kon het project niet toevoegen";
            $failed = true;
        }
    }
}
?>