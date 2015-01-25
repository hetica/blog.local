<h3>Lire un article</h3>
				
<form method="POST"
	action='index.php?page=editArticle<?php echo "&id=" . $id; ?>'>
	<input type="submit" value="Modifier" />
	</form>
		
	<form method="POST"
		action='index.php?page=deleteArticle<?php echo "&id=" . $id; ?>'>
		<input type="submit" value="Supprimer" />
</form>
		
<article>
	<?php
	if (isset ( $id )) {
		echo "<p><strong>" . $titre . "</p></strong>";
		echo "<p>" . nl2br ( $contenu ) . "</p>";
	} else {
		echo "<p>Aucun article demandé</p>";
	}
						?>
		
</article>
		
<form method="POST"
	action='index.php?page=editArticle<?php echo "&id=" . $id; ?>'>
	<input type="submit" value="Modifier" />
</form>
		
<form method="POST"
	action='index.php?page=deleteArticle<?php echo "&id=" . $id; ?>'>
	<input type="submit" value="Supprimer" />
</form>
<p></p>