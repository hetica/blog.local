<?php

class ArticleView {
	
	public function index ($articles) {
		
		echo '<h3>Liste des articles</h3>' ;		
		echo "<a href='index.php?page=editArticle'>Ajouter un article</a>";		
		foreach ( $articles as $article ) {
			echo "<article><p><strong>" . $article ['titre'] . "</strong></p>";
			echo "<p>" . nl2br ( mb_substr ( $article ['contenu'], 0, 70, 'UTF-8' ) ) .
			"... <a href='index.php?page=readArticle&id=" . $article ['id'] . "'>Lire la suite</a></p>";
			echo "</article>";
		}
		
	}
	
	public  function read ($article) {
		
		?>
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
<?php 
	}

	public function edit ($article, $id) {
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
		<?php
	}
	
	public function delete ($article) {

		?>
		<h3>Supprimer un article</h3>
		<form method="POST" action='index.php?page=deleteArticle<?php echo "&id=" . $article->id; ?>&del=true'>
			<input type="submit" value="Supprimer" />
		</form>
		
		<form method="POST" action='index.php'>
			<input type="submit" value="Annuler" />
		</form>
		
		<?php
		
		echo '<p><strong>' . $article->titre . '</strong><br/>' . nl2br($article->contenu) . '</p>';
				
	}
	
}

?>