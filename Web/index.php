<?php
require_once("functions/connect.php");
session_start();
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
    $page = "login";
}
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
		<link rel="stylesheet" href="css/main.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
		<title>Infocaster</title>
	</head>
	<body>
		<div class="navbar-fixed">
		    <nav>
				<div class="nav-wrapper z-depth-2" style= "background-color: var(--garnet);">
					<b><a href="index.php" class="brand-logo">Environment.Exit();</a></b>
					<?php
					if (isset ($_SESSION['loggedIn'])) {
					?>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="php/logout.php">Logout</a></li>
					</ul>
					<?php
					}
					?>
				</div>
		    </nav>
		</div>
		<ul class="side-nav" id="mobile-demo">
			<?php
			if (isset ($_SESSION['loggedIn'])) {
			?>
			<li><a href="php/logout.php">Logout</a></li>
			<?php
			}
			?>
		</ul>
		<script>
		$(document).ready(function(){
		    $(".button-collapse").sideNav();
			//$('.sidenav').sidenav();
			$('select').material_select();
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
            
