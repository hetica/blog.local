
<?php
/*
 * // id est égal à la valeur fournie dans l'url, par exemple "?id=22", sinon, id vaut 0
 * $id = isset ( $_GET ['id'] ) ? ( int ) $_GET ['id'] : 0;
 *
 * // if ($id > 0) {
 * // on crée une instance de l'article correspondant à l'id
 * $article = $articleRepo->get ( $id );
 * // on modifie l'article
 * $articleRepo->persist ( $article );
 * // }
 */
?>

<form name='article' method="POST"
	action="index.php?page=editArticle<?php
	echo ( ($id > 0) ? "&id=" . $id : "" );
	?>">
	<h3>Ajouter/Modifier un article</h3>
	<p>
		Titre <input type="text" name="titre"
			value="<?php
			echo ($id > 0) ? $article->titre : "";
			?>" />
	</p>
	<p>
		Contenu
		<textarea name="contenu" rows="10" cols="50"><?php
		echo ($id > 0) ? $article->contenu : "";
		?></textarea>
	</p>
	<input type="submit" name="soumis" />
</form>




