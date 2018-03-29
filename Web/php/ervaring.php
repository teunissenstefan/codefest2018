<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    $query = " 
        SELECT 
            *
        FROM persoon_skills_ervaring
    ";
    

    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    } 
    $persoon_skills_ervaringen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $aantalPersoon_Skills_Ervaringen = count($persoon_skills_ervaringen);
?>