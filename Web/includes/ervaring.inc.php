<?php
if($aantalGroepen == 0){
    echo "Er zijn geen groepen gevonden";
}else{
    //header
	echo "<a href='?page=adminmenu'><button>&#9668;Terug</button></a> ";
    echo "<a href='?page=ervaringadd'><button>Toevoegen</button></a> ";
    echo "<button onclick='window.location=window.location;'>Ververs</button>";
    echo "<div class='row rowHeader'>
            <div class='col s1'>ID</div>
            <div class='col s2'>Ervaring</div>
            <div class='col s2'>Uren gewenst</div>
            <div class='col s2'>Uren Effectief</div>
            <div class='col s2'>Acties</div>
        </div>";
    foreach($Ervaringen as $Ervaring){
        echo "<div class='row'>";

        $ErvaringQuery = " 
            SELECT 
                *
            FROM expertise
            WHERE 
                Persoon_Skills_Ervaring_Id = :Ervaring_Id
        ";
        try 
        { 
            $stmt = $con->prepare($ErvaringQuery); 
            $stmt->bindParam(':Ervaring_Id', $Ervaring['Expertise_Id']);
            $stmt->execute(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query (2)"); 
        }
        $ervaring_r = $stmt->fetch(PDO::FETCH_ASSOC);  
        if($ervaring_r){
            $ervaring = $ervaring_r['Omschrijving'];
        }else{
            $ervaring = "Niet gevonden";
        }


        echo "<div class='col s1'>".$Ervaring['Expertisegroep_Id']."</div>";
        echo "<div class='col s2'>".$Ervaring."</div>";
        echo "<div class='col s2'>".$Ervaring['Uren_Gewenst']."</div>";
        echo "<div class='col s2'>".$Ervaring['Uren_Effectief']."</div>";
        echo "<div class='col s2'><a href='?page=expertisegroepenedit&id=".$Ervaring['Expertisegroep_Id']."'>Bewerk</a> / <a href='?page=expertisegroependelete&id=".$Ervaring['Expertisegroep_Id']."'>Verwijder</a></div>";

        echo "</div>";
    }
}
?>