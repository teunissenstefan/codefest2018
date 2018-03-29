<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
$query = " 
        DELETE
        FROM projectdetail_skills
        WHERE 
            Skill_Id = :Skill_Id
    ";

try
{
    $stmt = $con->prepare($query);
    $stmt->bindParam(':Skill_Id', $_GET['id']);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (1)");
}

$query = " 
        DELETE
        FROM persoon_skills_ervaring
        WHERE 
            Skills_Id = :Skill_Id
    ";

try
{
    $stmt = $con->prepare($query);
    $stmt->bindParam(':Skill_Id', $_GET['id']);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (2)");
}

$query = " 
        DELETE
        FROM skill
        WHERE 
            Skill_Id = :Skill_Id
    ";


try
{
    $stmt = $con->prepare($query);
    $stmt->bindParam(':Skill_Id', $_GET['id']);
    $stmt->execute();
}
catch(PDOException $ex)
{
    die("Failed to run query (3)");
}

?>