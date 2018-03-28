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
			<div class="nav-wrapper red darken-4 z-depth-2">
			    <b><a href="index.php?page=index" class="brand-logo">Environment.Exit();</a></b>
			    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			    <ul id="nav-mobile" class="right hide-on-med-and-down">
			    <?php
				$link_prefix = "?page=";

				$navbar = array(
				        array("index", "Home"),
				        array("link", "link"),
				        array("link", "link"),
				        array("link", "link")
				);
				echo '';
				for($i=0;$i<count($navbar);$i++){
				    echo '<li class="';
				    if($page==$navbar[$i][0]){
				        echo "active";
				    }
				    echo'
				        "><b><a style="" href="'.$link_prefix.$navbar[$i][0].'">'.$navbar[$i][1].'</a></b></li>
				    ';
				}
			    ?>
			    </ul>
			</div>
		    </nav>
		</div>
		<ul class="side-nav" id="mobile-demo">
		<?php
		    $navbar = array(
			    array("index", "Home", "home"),
			    array("about", "About Us", "info"),
			    array("prices", "Prices", "shop"),
			    array("portfolio", "Portfolio", "description"),
		    );
		    echo '';
		    for($i=0;$i<count($navbar);$i++){
			echo '<li class="';
			if($page==$navbar[$i][0]){
			    echo "active";
			}
			echo'
			    "><a href="'.$link_prefix.$navbar[$i][0].'"><i class="small material-icons">'.$navbar[$i][2].'</i>'.$navbar[$i][1].'</a></li>
			';
		    }
		?>
		</ul>

		<script>
		$(document).ready(function(){
		    $(".button-collapse").sideNav();
		});
		</script>
		<div class="container">
		    asodj
		</div>
		<footer class="page-footer red darken-4">
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
            
