<?php
	
	$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : "nobody";
	$nom = isset($_GET['nom']) ? $_GET['nom'] : "nobody";

	$titre = isset($_POST['titre']) ? $_POST['titre'] : "" ;
	$contenu = isset($_POST['contenu']) ? $_POST['contenu'] : "" ;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles.css" />
		<title>Mon Blog</title>	
	</head>
	
	<body>
		<h1>Mon Blog</h1>

		<form name='article' method="POST" action="index.php">
			Formulaire de soumission d'article
			<p>Titre <input type="text" name="titre" value="<?php echo $titre; ?>"/></p>
			<p>Contenu <textarea name="contenu"></textarea></p>
			<input type="submit" name="soumis" />
		</form>

		<?php if (! empty($titre)) { ?>
			<p>Vous avez saisi : </p>
			<h3>Titre</h3><p><?php echo $titre ?></p>
			<h3>Contenu</h3><p><?php echo nl2br($contenu) ?></p>
		<?php }
		else {
			echo "<p>Vous n'avez rien saisi</p>" ;
		} ?>

		</p>
	</body>
</html>