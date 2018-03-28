<?php
if($aantalGroepen == 0){
    echo "Er zijn geen groepen gevonden";
}else{
    //header
    echo "<div class='row rowHeader'>
            <div class='col s1'>ID</div>
            <div class='col s2'>Expertise</div>
            <div class='col s2'>Uren gewenst</div>
            <div class='col s2'>Uren Effectief</div>
            <div class='col s2'>Acties</div>
        </div>";
    foreach($expertiseGroepen as $expertiseGroep){
        echo "<div class='row'>";

        $expertiseQuery = " 
            SELECT 
                *
            FROM expertise
            WHERE 
                Expertise_Id = :Expertise_Id
        ";
        try 
        { 
            $stmt = $con->prepare($expertiseQuery); 
            $stmt->bindParam(':Expertise_Id', $expertiseGroep['Expertise_Id']);
            $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (2)"); 
        }
        $expertise_r = $stmt->fetch(PDO::FETCH_ASSOC);  
        if($expertise_r){
            $expertise = $expertise_r['Omschrijving'];
        }else{
            $expertise = "Niet gevonden";
        }


        echo "<div class='col s1'>".$expertiseGroep['Expertisegroep_Id']."</div>";
        echo "<div class='col s2'>".$expertise."</div>";
        echo "<div class='col s2'>".$expertiseGroep['Uren_Gewenst']."</div>";
        echo "<div class='col s2'>".$expertiseGroep['Uren_Effectief']."</div>";
        echo "<div class='col s2'><a href='?page=expertisegroepenedit&id=".$expertiseGroep['Expertisegroep_Id']."'>Bewerk</a> / <a href='?page=expertisegroependelete&id=".$expertiseGroep['Expertisegroep_Id']."'>Verwijder</a></div>";

        echo "</div>";
    }
}
?>