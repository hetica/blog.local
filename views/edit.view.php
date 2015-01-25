<form name='article' method="POST"
	action="index.php?page=editArticle<?php
	echo ( ($id > 0) ? "&id=" . $id : "" );
	?>">
	<h3>Ajouter/Modifier un article</h3>
		<p>
			Titre <input type="text" name="titre"
				value="<?php echo ($id > 0) ? $titre : ""; ?>" />
		</p>
		<p>
			Contenu
			<textarea name="contenu" rows="10" cols="50"><?php
				echo ($id > 0) ? $contenu : "";
				?></textarea>
		</p>
		<input type="submit" name="soumis" />
</form>