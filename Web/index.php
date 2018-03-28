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
		<title>Example</title>
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
		<div class="container">
		    asodj
		</div>
		<footer class="page-footer" style= "background-color: #8b0000;"">
		    <div class="container">
			<div class="row">
			    <div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">Footer dingen enzo.</p>
			    </div>
			    <div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
				    <?php
				        $links = array(
				            array("index", "Home"),
				            array("about", "About Us"),
				            array("prices", "Prices"),
				            array("portfolio", "Portfolio"),
				        );
				        echo '';
				        for ($i=0;$i<count($links);$i++){
				            echo'
				                <li><a class="grey-text text-lighten-3" href="'.$links[$i][0].'">'.$links[$i][1].'</a></li>
				            ';
				        }
				    ?>
				</ul>
			    </div>
			</div>
		    </div>
		    <div class="footer-copyright">
			<div class="container">
			    Environment.Exit(); © 2018 Copyright
			</div>
		    </div>
		</footer>
	</body>
</html>
            
