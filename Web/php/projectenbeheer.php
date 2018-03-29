<?php
    $query = " 
        SELECT 
            *
        FROM project
        ORDER BY
            Deadline DESC
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
    $projecten = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $aantalProjecten = count($projecten);
?>