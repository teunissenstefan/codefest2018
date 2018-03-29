<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
$expertiseQuery = " 
    SELECT 
        *
     FROM expertise
";
try
{
    $stmt = $con->prepare($expertiseQuery);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (1)");
}
$expertises = $stmt->fetchAll(PDO::FETCH_ASSOC);

$post_expertise_id = "";
$post_omschrijving = "";
$post_prijs = "";
$failed = false;
if(isset($_POST['submit'])){
    $errorMsg = "Los de volgende problemen op:";

    if(!empty($_POST['expertise_id'])){
        $post_expertise_id = $_POST['expertise_id'];
    }else{
        $errorMsg.= "<br/>Vul de expertise in";
        $failed = true;
    }

   if($_POST['prijs']==0 || !empty($_POST['prijs'])){
        $post_prijs = $_POST['prijs'];
    }else{
        $errorMsg.= "<br/>Vul de prijs in";
        $failed = true;
    }

    if(!empty($_POST['omschrijving'])){
        $post_omschrijving = $_POST['omschrijving'];
    }else{
        $errorMsg.= "<br/>Vul de omschrijving in";
        $failed = true;
    }

    if($failed == false){
        //de query
        $query = " 
            INSERT INTO skill
            (Expertise_Id,Omschrijving,Prijs)
            VALUES (:Expertise_Id,:Omschrijving,:Prijs)
        ";
        try
        {
            $stmt = $con->prepare($query);
            $stmt->bindParam(':Expertise_Id', $post_expertise_id);
            $stmt->bindParam(':Omschrijving', $post_omschrijving);
            $stmt->bindParam(':Prijs', $post_prijs);
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            die("Failed to run query (2)");
        }
    }
}
?>