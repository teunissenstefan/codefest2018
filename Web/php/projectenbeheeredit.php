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
    FROM project
    WHERE 
        Project_Id = :Project_Id
";

try 
{ 
    $stmt = $con->prepare($query); 
    $stmt->bindParam(':Project_Id', $id);
    $stmt->execute();
} 
catch(PDOException $ex) 
{ 
    die("Failed to run query (1)"); 
}
$project = $stmt->fetch();

if($project){
    $persoonQuery = " 
        SELECT 
            *
        FROM persoon
        ORDER BY Achternaam ASC
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

    $post_owner_id = $project['Owner'];
    $post_project_naam = $project['Naam'];
    $post_organisatie = $project['Organization'];
    $post_telefoonnummer = $project['Phone'];
    $post_email = $project['Email'];
    $post_startdatum = $project['Startdatum'];
    $post_deadline = $project['Deadline'];
    $post_prijs = $project['Prijs'];
    $failed = false;
    if(isset($_POST['submit'])){
        $errorMsg = "Los de volgende problemen op:";

        if($_POST['prijs']==0 || !empty($_POST['prijs'])){
            $post_prijs = $_POST['prijs'];
        }else{
            $errorMsg.= "<br/>Vul de gewenste prijs in";
            $failed = true;
        }

        if(!empty($_POST['project_naam'])){
            $post_project_naam = $_POST['project_naam'];
        }else{
            $errorMsg.= "<br/>Vul de project naam in";
            $failed = true;
        }

        if(!empty($_POST['organisatie'])){
            $post_organisatie = $_POST['organisatie'];
        }else{
            $errorMsg.= "<br/>Vul de organisatie in";
            $failed = true;
        }

        if(!empty($_POST['telefoonnummer'])){
            $post_telefoonnummer = $_POST['telefoonnummer'];
        }else{
            $errorMsg.= "<br/>Vul de telefoonnummer in";
            $failed = true;
        }

        if(!empty($_POST['email'])){
            $post_email = $_POST['email'];
        }else{
            $errorMsg.= "<br/>Vul de email in";
            $failed = true;
        }

        if(!empty($_POST['startdatum'])){
            $post_startdatum = $_POST['startdatum'];
        }else{
            $errorMsg.= "<br/>Vul de startdatum in";
            $failed = true;
        }

        if(!empty($_POST['deadline'])){
            $post_deadline = $_POST['deadline'];
        }else{
            $errorMsg.= "<br/>Vul de deadline in";
            $failed = true;
        }

        $post_owner_id = $_POST['owner_id'];

        if($failed == false){
            //de query
            $query = " 
                UPDATE project
                SET Naam=:Naam,Owner=:Owner,Organization=:Organization,Phone=:Phone,Email=:Email,Startdatum=:Startdatum,Deadline=:Deadline,Prijs=:Prijs
                WHERE Project_Id=:Project_Id
            ";
            try 
            { 
                $stmt = $con->prepare($query); 
                $stmt->bindParam(':Project_Id', $_GET['id']);
                $stmt->bindParam(':Naam', $post_project_naam);
                $stmt->bindParam(':Owner', $post_owner_id);
                $stmt->bindParam(':Organization', $post_organisatie);
                $stmt->bindParam(':Phone', $post_telefoonnummer);
                $stmt->bindParam(':Email', $post_email);
                $stmt->bindParam(':Startdatum', $post_startdatum);
                $stmt->bindParam(':Deadline', $post_deadline);
                $stmt->bindParam(':Prijs', $post_prijs);
                $stmt->execute();
            } 
            catch(PDOException $ex) 
            { 
                die("Failed to run query (1)"); 
            } 
            
            if($stmt->rowCount()==1){
                
            }
        }
    }
}
?>