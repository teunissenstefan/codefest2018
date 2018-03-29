<?php
if($project){
    if(isset($_POST['submit'])){
        if($failed){
            echo $errorMsg;
        }else{
            header("Location:?page=projectenbeheer");
        } 
    }
?>
<div class="login">
    <form action="?page=projectenbeheeredit&id=<?php echo $id; ?>" method="POST">
    ID:<br>
    <input type="text" value="<?php echo $id; ?>" disabled><br>
    Project naam:<br>
    <input type="text" value="<?php echo $post_project_naam; ?>" name="project_naam"><br>
    Eigenaar:<br>
    <select name="owner_id">
        <?php
            foreach($personen as $persoon){
                echo "<option value='".$persoon['Pers_Id']."' ";
                if($post_owner_id==$persoon['Pers_Id']){
                    echo "selected";
                }
                echo ">".$persoon['Voornaam']." ".$persoon['Achternaam']."</option>";
            }
        ?>
    </select>
    Organisatie:<br>
    <input type="text" value="<?php echo $post_organisatie; ?>" name="organisatie"><br>
    Telefoon nummer:<br>
    <input type="text" value="<?php echo $post_telefoonnummer; ?>" name="telefoonnummer"><br>
    E-mail:<br>
    <input type="email" value="<?php echo $post_email; ?>" name="email"><br>
    Startdatum:<br>
    <input type="text" value="<?php echo $post_startdatum; ?>" name="startdatum"><br>
	Deadline:<br>
    <input type="text" value="<?php echo $post_deadline; ?>" name="deadline"><br>
	Prijs:<br>
    <input type="text" value="<?php echo $post_prijs; ?>" name="prijs"><br>
    <input type="submit" name="submit" value="Opslaan">
    </form>
</div>
<?php
}else{
    echo "Groep niet gevonden";
}
?>