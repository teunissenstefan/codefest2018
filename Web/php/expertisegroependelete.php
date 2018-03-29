<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    $query = " 
        DELETE
        FROM expertisegroep_persoon
        WHERE 
            Expertisegroep_Id = :Expertisegroep_Id
    ";


    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Expertisegroep_Id', $_GET['id']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    } 


    $query = " 
        DELETE
        FROM expertisegroep
        WHERE 
            Expertisegroep_Id = :Expertisegroep_Id
    ";
    

    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Expertisegroep_Id', $_GET['id']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    } 
?>