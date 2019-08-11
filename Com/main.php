 <div id="corps">
    <h1>Mon super site</h1>
    
    <p>
        Bienvenue sur mon super site !<br />
        Vous allez adorer ici, c'est un site génial qui va parler de... euh... Je cherche encore un peu le thème de mon site. :-D
    </p>

    <h2>Page de test</h2>
        
	<p>
	    Cette page contient du code HTML avec des balises PHP.<br />
	    <?php /* Insérer du code PHP ici */ ?>
	    Voici quelques petits tests :
	</p>
	
	<ul>
	<li style="color: blue;">Texte en bleu</li>
	<li style="color: red;">Texte en rouge</li>
	<li style="color: green;">Texte en vert</li>
	</ul>
	
	<?php
	    $age_du_visiteur = 17;
	?>

	<?php echo "Benvenue dans le HighMediaServeur"; ?>
	<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
	<p> Vous avez actuellement : <?php echo $age_du_visiteur; ?> </p>

	<p>
    Veuillez taper votre prénom :
	</p>

	<form action="video.php" method="post">
	<p>
	    <input type="text" name="Pseudo" />
	</p>
	
	<p>
	    <input type="submit" value="Condirmer" />
	</p>
	</form>

	<a href="video.php?nom=Dupont&amp;prenom=Jean">Video </a>
</div>