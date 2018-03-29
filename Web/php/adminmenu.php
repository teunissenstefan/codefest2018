<?php
if($_SESSION['rol']!="Admin"){
    header("Location:?page=personaldashboard");
}
?>