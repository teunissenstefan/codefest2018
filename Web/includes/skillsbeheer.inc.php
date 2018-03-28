<?php
if($aantalGroepen == 0){
    echo "Er zijn geen groepen gevonden";
}else{
    //header
    echo "<div class='row rowHeader'>
            <div class='col s1'>ID</div>
            <div class='col s2'>Expertise</div>
            <div class='col s2'>Omschrijving</div>
            <div class='col s2'>Prijs</div>
            <div class='col s2'>Actie</div>
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


        echo "<div class='col s1'>".$expertiseGroep['Skill_Id']."</div>";
        echo "<div class='col s2'>".$expertise."</div>";
        echo "<div class='col s2'>".$expertiseGroep['Omschrijving']."</div>";
        echo "<div class='col s2'>".$expertiseGroep['Prijs']."</div>";
        echo "<div class='col s2'><a href='?page=skillsbeheeredit&id=".$expertiseGroep['Skill_Id']."'>Bewerk</a> / <a href='?page=skillsbeheerdelete&id=".$expertiseGroep['Skill_Id']."'>Verwijder</a></div>";

        echo "</div>";
    }
}
?>