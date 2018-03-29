<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
    $query = " 
        DELETE
        FROM persoon_skills_ervaring
        WHERE 
            Pers_Id = :Pers_Id
    ";
    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Pers_Id', $_GET['uid']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (1)"); 
    } 
    $query = " 
        DELETE
        FROM expertisegroep_persoon
        WHERE 
            Pers_Id = :Pers_Id
    ";
    try 
    { 
        $stmt = $con->prepare($query); 
        $stmt->bindParam(':Pers_Id', $_GET['uid']);
        $stmt->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (2)"); 
    } 

    $query = " 
        DELETE
        FROM persoon
        WHERE 
            Pers_Id = :Pers_Id
    ";
    try 
    { 
        $stmtd = $con->prepare($query); 
        $stmtd->bindParam(':Pers_Id', $_GET['uid']);
        $stmtd->execute();
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to run query (3)"); 
    } 
    if($stmtd->rowCount()==1){
        header("Location:?page=medewerkerbeheer");
        echo "Persoon is verwijderd";
    }else{
        echo "Persoon kon niet verwijderd worden";
    }
?>