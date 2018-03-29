<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    $query = " 
        SELECT 
            *
        FROM expertisegroep
        ORDER BY
            Expertisegroep_Id DESC
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
    $expertiseGroepen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $aantalGroepen = count($expertiseGroepen);
?>