<?php
echo "<a href='?page=adminmenu'><button>&#9668;Terug</button></a> ";
echo "<a href='?page=projectenbeheeradd'><button>Toevoegen</button></a> ";
echo "<button onclick='window.location=window.location;'>Ververs</button>";

    echo "<div class='row rowHeader'>
            <div class='col s1'>ID</div>
            <div class='col s2'>Naam</div>
            <div class='col s2'>Eigenaar</div>
            <div class='col s2'>Organisatie</div>
            <div class='col s2'>Deadline</div>
            <div class='col s1'>Prijs</div>
            <div class='col s2'>Acties</div>
        </div>";
    foreach($projecten as $project){
        echo "<div class='row'>";

        $persoonQuery = " 
            SELECT * FROM persoon WHERE 
				Pers_Id = :Pers_Id
				";
        try 
        { 
            $stmt = $con->prepare($persoonQuery); 
            $stmt->bindParam(':Pers_Id', $project['Owner']);
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


        echo "<div class='col s1'>".$project['Project_Id']."</div>";
        echo "<div class='col s2'>".$project['Naam']."</div>";
        echo "<div class='col s2'>".$persoon."</div>";
        echo "<div class='col s2'>".$project['Organization']."</div>";
        echo "<div class='col s2'>".$project['Deadline']."</div>";
        echo "<div class='col s1'>".$project['Prijs']."</div>";
        echo "<div class='col s2'><a href='?page=projectenbeheeredit&id=".$project['Project_Id']."'>Bewerk</a> / <a href='?page=projectenbeheerdelete&id=".$project['Project_Id']."'>Verwijder</a></div>";

        echo "</div>";
    }

?>