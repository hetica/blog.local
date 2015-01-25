<h3>Lire un article</h3>

<form method="POST"
	action='index.php?page=editArticle<?php echo "&id=" . $article->id; ?>'>
	<input type="submit" value="Modifier" />
</form>

<form method="POST"
	action='index.php?page=deleteArticle<?php echo "&id=" . $article->id; ?>'>
	<input type="submit" value="Supprimer" />
</form>

<article>

<?php
if (isset ( $article )) {
	echo "<p><strong>" . $article->titre . "</p></strong>";
	echo "<p>" . nl2br ( $article->contenu ) . "</p>";
} else {
	echo "<p>Aucun article demandé</p>";
}
?>

</article>

<form method="POST"
	action='index.php?page=editArticle<?php echo "&id=" . $article->id; ?>'>
	<input type="submit" value="Modifier" />
</form>

<form method="POST"
	action='index.php?page=deleteArticle<?php echo "&id=" . $article->id; ?>'>
	<input type="submit" value="Supprimer" />
</form>
<p></p>