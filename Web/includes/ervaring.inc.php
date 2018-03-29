<?php
echo "<a href='?page=adminmenu'><button>&#9668;Terug</button></a> ";
echo "<a href='?page=ervaringadd'><button>Toevoegen</button></a> ";
echo "<button onclick='window.location=window.location;'>Ververs</button>";
if($aantalPersoon_Skills_Ervaringen == 0){
    echo "Er zijn geen ervaringen gevonden";
}else{
    //header
    echo "<div class='row rowHeader'>
            <div class='col s1'>ID</div>
            <div class='col s2'>Persoon</div>
            <div class='col s2'>Skill</div>
            <div class='col s2'>Ervaring</div>
            <div class='col s2'>Acties</div>
        </div>";
    foreach($persoon_skills_ervaringen as $persoon_skills_ervaring){
        echo "<div class='row'>";

        $ervaringenQuery = " 
            SELECT 
                *
            FROM ervaring
            WHERE 
                Ervaring_Id=:Ervaring_Id
        ";
        try 
        { 
            $stmt = $con->prepare($ervaringenQuery); 
            $stmt->bindParam(':Ervaring_Id', $persoon_skills_ervaring['Ervaring_Id']);
            $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (1)"); 
        }
        $ervaring = $stmt->fetch(PDO::FETCH_ASSOC);  
        if($ervaring){
            $ervaring = $ervaring['Omschrijving'];
        }else{
            $ervaring = "Niet gevonden";
        }
        $persoonQuery = " 
            SELECT 
                *
            FROM persoon
            WHERE 
                Pers_Id=:Pers_Id
        ";
        try 
        { 
            $stmt = $con->prepare($persoonQuery); 
            $stmt->bindParam(':Pers_Id', $persoon_skills_ervaring['Pers_Id']);
            $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (2)"); 
        }
        $persoon = $stmt->fetch(PDO::FETCH_ASSOC);  
        if($persoon){
            $persoon = $persoon['Voornaam']." ".$persoon['Achternaam'];
        }else{
            $persoon = "Niet gevonden";
        }
        $skillQuery = " 
            SELECT 
                *
            FROM skill
            WHERE 
                Skill_Id=:Skill_Id
        ";
        try 
        { 
            $stmt = $con->prepare($skillQuery); 
            $stmt->bindParam(':Skill_Id', $persoon_skills_ervaring['Skills_Id']);
            $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (3)"); 
        }
        $skill = $stmt->fetch(PDO::FETCH_ASSOC);  
        if($skill){
            $skill = $skill['Omschrijving'];
        }else{
            $skill = "Niet gevonden";
        }


        echo "<div class='col s1'>".$persoon_skills_ervaring['Persoon_Skills_Ervaring_Id']."</div>";
        echo "<div class='col s2'>".$persoon."</div>";
        echo "<div class='col s2'>".$skill."</div>";
        echo "<div class='col s2'>".$ervaring."</div>";
        echo "<div class='col s2'><a href='?page=ervaringedit&id=".$persoon_skills_ervaring['Persoon_Skills_Ervaring_Id']."'>Bewerk</a> / <a href='?page=ervaringdelete&id=".$persoon_skills_ervaring['Persoon_Skills_Ervaring_Id']."'>Verwijder</a></div>";

        echo "</div>";
    }
}
?>