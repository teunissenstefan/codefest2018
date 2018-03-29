<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = " 
    SELECT *
  FROM skill
        WHERE 
            Skill_Id = :Skill_Id
";

try
{
    $stmt = $con->prepare($query);
    $stmt->bindParam(':Skill_Id', $id);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (1)");
}
$skill = $stmt->fetch();

$expertiseQuery = " 
    SELECT 
        *
     FROM expertise
";
try
{
    $stmt = $con->prepare($expertiseQuery);
    $stmt->bindParam(':Expertise_Id', $skill['Expertise_Id']);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (2)");
}
$expertises = $stmt->fetchAll(PDO::FETCH_ASSOC);

$post_expertise_id = $skill['Expertise_Id'];
$post_omschrijving = $skill['Omschrijving'];
$post_prijs = $skill['Prijs'];
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
            UPDATE skill
            SET Expertise_Id=:Expertise_Id,Omschrijving=:Omschrijving,Prijs=:Prijs
            WHERE Skill_Id=:Skill_Id
        ";
        try
        {
            $stmt = $con->prepare($query);
            $stmt->bindParam(':Skill_Id', $_GET['id']);
            $stmt->bindParam(':Expertise_Id', $post_expertise_id);
            $stmt->bindParam(':Omschrijving', $post_omschrijving);
            $stmt->bindParam(':Prijs', $post_prijs);
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            die("Failed to run query (1)");
        }
        header("Location:?page=skillbeheer");
    }
}
?>