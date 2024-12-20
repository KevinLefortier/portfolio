<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="" rel="styleshit" integrity="" crossorigin="anonymous">

		<link rel="stylesheet" href="styles.css">
		<link rel="shortcut icon" href="Users\klefortier\Documents\WEB-SLAM/tkt">

		<title>WEB PROJECT</title>
		<link rel="website icon" type="png" href="images/eto.png">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>


<body>
	
	<h1>Bienvenue</h1>
	
<br />
<br />
<header>
<hr>
<div id="menu-container">
    <div id="burger-menu">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <nav id="nav-menu">
        <ul class="nav-link">
            <li><a href="#Acceuil"><strong>Accueil</strong></a></li>
            <li><a href="#comp"><strong>Compétences</strong></a></li>
            <li><a href="#realisations"><strong>Réalisations</strong></a></li>
            <li><a href="#formation"><strong>Formation</strong></a></li>
		    <li><a href="#contact"><strong>Contact</strong></a></li>
	    </ul>
    </nav>
</div>
<!--<script src="menu.js"></script>-->


<div id="Acceuil"><h2>Accueil</h2></div>
<br/>
<?php include("pages/php/acceuil.php"); ?>
<br />
<br />
<br />
<hr>
<br />
<br />
<br />
<div id="comp"><h2>Compétences</h2></div>
<br />
<p><?php include("pages/php/competence.php"); ?></p>
<br />
<br />
<br />
<hr>
<br />
<br />
<br>
<div id="realisations"><h2>Réalisations</h2></div>
<br />
<p><?php include("pages/php/realisation.php"); ?></p>
<br />
<br>
<br>
<hr>
<br>
<br>
<br>
<div id="formation"><h2>Formation</h2></div>
<br>
<p><?php include("pages/php/formation.php"); ?></p>
<br />
<br />
<br />
<br />
<br />
<hr>
<br />
<div id="contact"><h2>Me contacter</h2></div>
<br />

<div class="form-container">
	<form action="php/mail.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br><br>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br><br>
        </div>
       
        <div class="form-group">
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" required><br><br>
        </div>
       
        <div class="form-group full-width">
            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
        </div>
    
        <div class="form-group full-width">
            <button type="submit">Envoyer</button><br><br>
        </div>

	    <div class="g-recaptcha" data-sitekey="6LfjRDgpAAAAAAFhdAp8dCmSmgZctoVZw0-mMy_c"></div>
    </form>
</div>

<br />
<br />
</header>


</body>