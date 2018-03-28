<?php
    if(isset($_POST['submit'])){
        if($failed){
            echo $errorMsg;
        }else{
            header("Location:?page=expertisegroepen");
        } 
    }
?>
<div class="login">
    <form action="?page=expertisegroepenadd" method="POST">
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