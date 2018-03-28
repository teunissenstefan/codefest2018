<?php
require_once("functions/connect.php");

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = "login";
}
?>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/main.css">

		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
		<title>Infocaster</title>
	</head>
	<body>
		<div class="navbar-fixed">
		    <nav>
			<div class="nav-wrapper z-depth-2" style= "background-color: #8b0000;">
			    <b><a href="index.php?page=index" class="brand-logo">Environment.Exit();</a></b>
			</div>
		    </nav>
		</div>
		<script>
		$(document).ready(function(){
		    $(".button-collapse").sideNav();
		});
		</script>
		<div class="container content">
		    <?php
			if(is_file("php/".$page.".php")){
		        include_once("php/".$page.".php");
            }
		    if(is_file("includes/".$page.".inc.php")){
		        include_once("includes/".$page.".inc.php");
            }else{
				echo "Pagina niet gevonden";
			}

		    ?>
		</div>
	</body>
</html>
            
