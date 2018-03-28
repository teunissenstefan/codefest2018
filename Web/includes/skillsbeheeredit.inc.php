<?php
if($expertiseGroep){
    if(isset($_POST['submit'])){
        if($failed){
            echo $errorMsg;
        }else{
            header("Location:?page=expertisegroepen");
        }
    }
    ?>
    <div class="login">
        <form action="?page=expertisegroepenedit&id=<?php echo $id; ?>" method="POST">
            ID:<br>
            <input type="text" value="<?php echo $id; ?>" disabled><br>
            Expertise:<br>
            <select name="expertise_id">
                <?php
                foreach($expertises as $expertise){
                    echo "<option value='".$expertise['Expertise_Id']."' ";
                    if($post_expertise_id==$expertise['Expertise_Id']){
                        echo "selected";
                    }
                    echo ">".$expertise['Omschrijving']."</option>";
                }
                ?>
            </select>
            Uren gewenst:<br>
            <input type="text" value="<?php echo $post_uren_gewenst; ?>" name="uren_gewenst"><br>
            Uren effectief:<br>
            <input type="text" value="<?php echo $post_uren_effectief; ?>" name="uren_effectief"><br>
            Kartrekker:<br>
            <select name="kartrekker">
                <option value="1" <?php if($post_kartrekker==1){echo"selected";} ?>>Ja</option>
                <option value="0" <?php if($post_kartrekker==0){echo"selected";} ?>>Nee</option>
            </select>
            Omschrijving:<br>
            <textarea class="materialize-textarea" name="omschrijving"><?php echo $post_omschrijving; ?></textarea>
            <input type="submit" name="submit" value="Opslaan">
        </form>
    </div>
    <form action="?page=expertisegroepenedit&id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="row">
            <div class="col l3 show-on-large">
                &nbsp;
            </div>
            <div class="col l2 center">
                <select name="personen" class="browser-default" size="10" style="height:200px;">
                    <?php
                    foreach($personen as $persoon){
                        echo "<option value='".$persoon['Pers_Id']."'>".$persoon['Voornaam']." ".$persoon['Achternaam']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col l2 center">
                <input type="submit" name="links" value="<">
                <input type="submit" name="rechts" value=">">
            </div>
            <div class="col l2 center">
                <select name="assigned" class="browser-default" size="10" style="height:200px;">
                    <?php
                    foreach($assigned as $persoon){
                        $assigned_qQuery = " 
                            SELECT 
                                *
                            FROM persoon
                            WHERE Pers_Id=:Pers_Id
                        ";
                        try
                        {
                            $stmt = $con->prepare($assigned_qQuery);
                            $stmt->bindParam(':Pers_Id', $persoon['Pers_Id']);
                            $stmt->execute();
                        }
                        catch(PDOException $ex)
                        {
                            die("Failed to run query (2)");
                        }
                        $assigned_q = $stmt->fetch(PDO::FETCH_ASSOC);

                        echo "<option value='".$assigned_q['Pers_Id']."'>".$assigned_q['Voornaam']." ".$assigned_q['Achternaam']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col l3 show-on-large">
                &nbsp;
            </div>
        </div>
    </form>
    <?php
}else{
    echo "Groep niet gevonden";
}
?>