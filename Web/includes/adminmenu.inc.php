<?php
	if (isset($_SESSION['loggedIn'])) {
?>
<div class="row">
    <div class="col s12 l4" style="text-align:center;">
        <a href="?page=medewerkerbeheer">
            <img src="images/medewerkers.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Medewerkers</div>
    </div>


    <div class="col s12 l4" style="text-align:center;">
        <a href="?page=expertisegroepen">
            <img src="images/expertisegroepen.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Expertisegroepen</div>
    </div>


    <div class="col s12 l4" style="text-align:center;">
        <a href="?page=projectenbeheer">
            <img src="images/projecten.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Projecten</div>
    </div>
</div>


<div class="row">
    <div class="col s12 l4" style="text-align:center;">
        <a href="?page=ervaring">
            <img src="images/ervaringslevels.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Ervaringslevels</div>
    </div>


    <div class="col s12 l4" style="text-align:center;">
        <a href="?page=skillsbeheer">
            <img src="images/skills.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Skills</div>
    </div>


    <div class="col s12 l4" style="text-align:center;">
        <a href="#">
            <img src="images/gebruikersbeheer.png" alt="" width="150" height="150">
        </a>
        <div class="desc">Gebruikersbeheer</div>
    </div>
</div>

<div class="clearfix"></div>

<?php
	}
?>