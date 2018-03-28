<?php
    $query = " 
        SELECT 
            *
        FROM Expertisegroep
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