<?php

if($stmt->rowCount()==1){
    header("Location:?page=expertisegroepen");
    echo "Expertisegroep is verwijderd";
}else{
    echo "Expertisegroep kon niet verwijderd worden";
}

?>