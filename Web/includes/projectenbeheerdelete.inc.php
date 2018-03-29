<?php

if($stmt->rowCount()==1){
    header("Location:?page=projectenbeheer");
    echo "Project is verwijderd";
}else{
    echo "Project kon niet verwijderd worden";
}

?>