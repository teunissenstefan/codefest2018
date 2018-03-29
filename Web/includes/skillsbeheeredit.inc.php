<?php
if($skill){
    if(isset($_POST['submit'])){
        if($failed){
            echo $errorMsg;
        }else{
            header("Location:?page=skillsbeheer");
        }
    }
    ?>
    <div class="login">
        <form action="?page=skillsbeheeredit&id=<?php echo $id; ?>" method="POST">
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
            Prijs:<br>
            <input type="text" value="<?php echo $post_prijs; ?>" name="prijs"><br>
            Omschrijving:<br>
            <input type="text" value="<?php echo $post_omschrijving; ?>" name="omschrijving"><br>
            <input type="submit" name="submit" value="Opslaan">
        </form>
    </div>
    <?php
}else{
    echo "Skill niet gevonden";
}
?>