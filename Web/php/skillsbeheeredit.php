<?php
$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = " 
    SELECT *
  FROM projectdetail_skills
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
$expertiseGroep = $stmt->fetch();

$persoonQuery = " 
    SELECT 
        *
    FROM persoon_skills_ervaring
        WHERE 
            Skills_Id = :Skill_Id
";
try
{
    $stmt = $con->prepare($persoonQuery);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (2)");
}
$personen = $stmt->fetchAll(PDO::FETCH_ASSOC);

$assignedQuery = " 
    SELECT 
        *
     FROM persoon_skills_ervaring
        WHERE 
            Skills_Id = :Skill_Id
";
try
{
    $stmt = $con->prepare($assignedQuery);
    $stmt->bindParam(':Skill_Id', $expertiseGroep['Expertisegroep_Id']);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (3)");
}
$assigned = $stmt->fetchAll(PDO::FETCH_ASSOC);

$expertiseQuery = " 
    SELECT 
        *
    FROM skill
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

$post_expertise_id = $expertiseGroep['Skill_Id'];
$post_uren_gewenst = $expertiseGroep['Expertise_id'];
$post_uren_effectief = $expertiseGroep['Omschrijving'];
$post_kartrekker = $expertiseGroep['Prijs'];
$failed = false;
if(isset($_POST['submit'])){
    $errorMsg = "Los de volgende problemen op:";

    if($_POST['Skill_id']==0 || !empty($_POST['Skill_id'])){
        $post_Skill_id = $_POST['skill_id'];
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

   ! if($_POST['uren_effectief']==0 || !empty($_POST['uren_effectief'])){
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
            UPDATE expertisegroep
            SET Expertise_Id=:Expertise_Id,Uren_Gewenst=:Uren_Gewenst,Uren_Effectief=:Uren_Effectief,Karttrekker=:Kartrekker,Omschrijving=:Omschrijving
            WHERE Expertisegroep_Id=:Expertisegroep_Id
        ";
        try
        {
            $stmt = $con->prepare($query);
            $stmt->bindParam(':Expertisegroep_Id', $_GET['id']);
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

        if($stmt->rowCount()==1){

        }
        header("Location:?page=expertisegroepen");
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