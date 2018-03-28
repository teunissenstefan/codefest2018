<?php

if($stmt->rowCount()==1){
    header("Location:?page=skillsbeheer");
    echo "Skillsbeheer is verwijderd";
}else{
    echo "Skillsbeheer kon niet verwijderd worden";
}

?>