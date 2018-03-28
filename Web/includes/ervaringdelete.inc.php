<?php

if($stmt->rowCount()==1){
    header("Location:?page=ervaring");
    echo "Ervaring is verwijderd";
}else{
    echo "Ervaring kon niet verwijderd worden";
}

?>