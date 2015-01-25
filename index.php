<?php
require ('includes/pdo.php');
require ('includes/views.php');
require ('models/Article.class.php');
require ('controllers/Article.controller.php');
require ('views/Article.view.php');

// on récupère le nom et le prénom en GET
$prenom = isset ( $_GET ['prenom'] ) ? $_GET ['prenom'] : "nobody";
$nom = isset ( $_GET ['nom'] ) ? $_GET ['nom'] : "nobody";

// page permet d'inclure la page demandée par l'utilisateur
$page = isset ( $_GET ['page'] ) ? $_GET ['page'] : "home";

/* bloc contrôleur central */
$articleRepo = new ArticleRepository ( $pdo );
$articleControl = new ArticleController ($articleRepo);
$articleView = new ArticleView() ;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="styles.css" />
<title>Mon Blog</title>
</head>

<body>
	<a href="index.php"><h1>Mon Blog</h1></a>
	<p>Bonjour <?php echo $prenom . " " . $nom; ?> </p>

		

		<?php
		if (isset ( $_GET ['msg'] )) {
			echo "<p id='alert'>" . $_GET ['msg'] . "</p>";
		}
		
		/* bloc controleur frontal (CRUD) */
		
		switch ($page) {
			case 'newArticle' :
			case 'editArticle' :
				$articleControl->editArticle($articleView);
				break;
			
			case 'deleteArticle' :
				$articleControl->deleteArticle ( $articleView );
				break;
			
			case 'article' :
			case 'readArticle' :
				$articleControl->readArticle ( $articleView );
				break;
			
			case "home" :
			default :
				$articleControl->indexArticles ( $articleView );
		}
		?>

	</body>
</html>
