<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    $query = " 
        DELETE
        FROM project
        WHERE 
            Project_Id = :Project_Id
    ";


    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Project_Id', $_GET['id']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    } 
?>