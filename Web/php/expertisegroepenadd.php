<?php
$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$expertiseQuery = " 
    SELECT 
        *
    FROM expertise
    ORDER BY Omschrijving ASC
";
try 
{ 
    $stmt = $con->prepare($expertiseQuery); 
    $stmt->execute(); 
} 
catch(PDOException $ex) 
{ 
    die("Failed to run query (4)"); 
}
$expertises = $stmt->fetchAll(PDO::FETCH_ASSOC);  

$post_expertise_id = "";
$post_uren_gewenst = "";
$post_uren_effectief = "";
$post_kartrekker = "";
$post_omschrijving = "";
$failed = false;
if(isset($_POST['submit'])){
    $errorMsg = "Los de volgende problemen op:";

    if($_POST['uren_gewenst']==0 || !empty($_POST['uren_gewenst'])){
        $post_uren_gewenst = $_POST['uren_gewenst'];
    }else{
        $errorMsg.= "<br/>Vul de gewenste uren in";
        $failed = true;
    }

    if(!empty($_POST['expertise_id'])){
        $post_expertise_id = $_POST['expertise_id'];
    }else{
        $errorMsg.= "<br/>Vul de expertise in";
        $failed = true;
    }

    if($_POST['uren_effectief']==0 || !empty($_POST['uren_effectief'])){
        $post_uren_effectief = $_POST['uren_effectief'];
    }else{
        $errorMsg.= "<br/>Vul de effectieve uren in";
        $failed = true;
    }

    $post_kartrekker = $_POST['kartrekker'];
    $post_omschrijving = $_POST['omschrijving'];

    if($failed == false){
        //de query
        $query = " 
            INSERT INTO expertisegroep
            (Expertise_Id,Uren_Gewenst,Uren_Effectief,Karttrekker,Omschrijving)
            VALUES (:Expertise_Id,:Uren_Gewenst,:Uren_Effectief,:Kartrekker,:Omschrijving)
        ";
        try 
        { 
            $stmt = $con->prepare($query); 
            $stmt->bindParam(':Expertise_Id', $post_expertise_id);
            $stmt->bindParam(':Uren_Gewenst', $post_uren_gewenst);
            $stmt->bindParam(':Uren_Effectief', $post_uren_effectief);
            $stmt->bindParam(':Omschrijving', $post_omschrijving);
            $stmt->bindParam(':Kartrekker', $post_kartrekker);
            $stmt->execute();
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (1)"); 
        } 
        if($stmt->rowCount()!=1){
            $errorMsg.= "Kon de expertisegroep niet toevoegen";
            $failed = true;
        }
    }
}
if(isset($_POST['links']) && isset($_POST['assigned'])){//Persoon verwijderen uit de groep
    $query = " 
        DELETE FROM expertisegroep_persoon
        WHERE Expertisegroep_Id=:Expertisegroep_Id AND Pers_Id=:Pers_Id
    ";
    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Expertisegroep_Id', $_GET['id']);
        $stmt->bindParam(':Pers_Id', $_POST['assigned']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    }
    header("Location:?page=expertisegroepenedit&id=".$id);
}
if(isset($_POST['rechts']) && isset($_POST['personen'])){//Persoon toevoegen aan de groep
    $query = "INSERT INTO expertisegroep_persoon
        (Expertisegroep_Id,Pers_Id)
        VALUES (:Expertisegroep_Id,:Pers_Id)
    ";
    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Expertisegroep_Id', $_GET['id']);
        $stmt->bindParam(':Pers_Id', $_POST['personen']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    }
    header("Location:?page=expertisegroepenedit&id=".$id);
}
?>