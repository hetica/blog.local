<h3>Liste des articles</h3>

<a href='index.php?page=editArticle'>Ajouter un article</a>

<?php

foreach ( $articles as $article ) {
	echo "<article><p><strong>" . $article ['titre'] . "</strong></p>";
	echo "<p>" . nl2br ( mb_substr ( $article ['contenu'], 0, 70, 'UTF-8' ) ) . 
		"... <a href='index.php?page=readArticle&id=" . $article ['id'] . "'>Lire la suite</a></p>";
	echo "</article>";
}


