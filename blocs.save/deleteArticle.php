<h3>Supprimer un article</h3>

<?php
/*
	// on récupère le numéro de l'article, et la validation de suppression
	$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
	$del = isset($_GET['del']) ? $_GET['del'] : null;

	if ( $id > 0) {
		// on récupère le contenu de l'article
		$article = $articleRepo->get($id) ;
	}

	if (isset($del)) {
		// On supprime l'article 
		$articleRepo->remove($article);
		// on revient à index.php en renvoyant un message dans l'url
		header("Location: index.php?msg=" . urlencode("L'article " . $article->titre . " a été supprimé avec succès."));
	}
*/
	?>

	<form method="POST" action='index.php?page=deleteArticle<?php echo "&id=" . $article->id; ?>&del=true'>
		<input type="submit" value="Supprimer" />
	</form>

	<form method="POST" action='index.php'>
		<input type="submit" value="Annuler" />
	</form>

	<?php

	echo '<p><strong>' . $article->titre . '</strong><br/>' . nl2br($article->contenu) . '</p>';

