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
	Project naam:<br>
    <input type="text" value="<?php echo $post_uren_gewenst; ?>" name="uren_gewenst"><br>
    
    Eigenaar:<br>
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
    Organisatie:<br>
    <input type="text" value="<?php echo $post_uren_gewenst; ?>" name="uren_gewenst"><br>
    Telefoon nummer:<br>
    <input type="text" value="<?php echo $post_uren_effectief; ?>" name="uren_effectief"><br>
    E-mail:<br>
    <input type="text" value="<?php echo $post_uren_effectief; ?>" name="uren_effectief"><br>
    Startdatum:<br>
    <input type="text" value="<?php echo $post_uren_effectief; ?>" name="uren_effectief"><br>
	Deadline:<br>
    <input type="text" value="<?php echo $post_uren_gewenst; ?>" name="uren_gewenst"><br>
   
	Prijs:<br>
    <input type="text" value="<?php echo $post_uren_gewenst; ?>" name="uren_gewenst"><br>
   
    <input type="submit" name="submit" value="Opslaan">
    </form>
</div>