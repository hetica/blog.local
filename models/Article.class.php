<?php

/**
 * Objet métier Article
 * 
 * @author ben
 *
 */
class Article {
	public $id;
	public $titre;
	public $contenu;
	public function __construct($params) {
		$this->id = $params ['id'];
		$this->titre = $params ['titre'];
		$this->contenu = $params ['contenu'];
	}
	public function getId() {
	}
}

/**
 *
 * Permet de gérer les articles en BD
 *
 * @author bEN
 */
class ArticleRepository {
	private $_pdo;
	public function __construct(PDO &$pdo) {
		$this->_pdo = $pdo;
	}
	
	/**
	 * Renvoie l'article correspondant à l'id
	 * ou null si aucun article ne correspond à cet id
	 *
	 * @param int $id        	
	 * @return Article or null
	 */
	public function get($id) {
		$sql = "SELECT * FROM article WHERE id = " . $id;
		$query = $this->_pdo->query ( $sql );
		$resultat = $query->fetch ();
		$query->closeCursor ();
		
		// on instancie un nouvel article
		$article = new Article ( $resultat );
		
		/*
		 * Ça, c'est plus classe pour créer l'article
		// on demande à PDO de retourner les résultats dans une classe article
		$query->setFetchMode(PDO::FETCH_CLASS, "Article");
		// on lui demande un résultats
		$article = $query->fetch();
		*/
		
		if ($article)
			return $article;
		
		return null;
	}
	
	/**
	 * Renvoie tous les articles
	 */
	public function getAll() {
		$sql = "SELECT * FROM article ORDER BY id DESC LIMIT 0,4" ;
		$query = $this->_pdo->query ( $sql );
		$articles = $query->fetchAll();
		$query->closeCursor ();
		
		return $articles;
	}
	
	/**
	 * Insère ou met à jour un article de la base de données
	 * 
	 * @param Article $article        	
	 */
	public function persist(Article $article) {
		
		if ( $article->id > 0) {
			// on modifie l'article en question avec les nouvelles valeurs
			$sql = "UPDATE article SET titre=:titre, contenu=:contenu WHERE id=".$article->id;
		} else {
			// on crée un nouvel article
			$sql = "INSERT INTO article (titre, contenu) VALUES(:titre, :contenu)";
		}
		// la méthode 'prepare' prepare la requête sql à être exécutée
		$req = $this->_pdo->prepare($sql);
		// on crée une array associative avec les clés 'titre' et 'contenu'
		$params = array('titre' => $_POST['titre'],
				'contenu' => $_POST['contenu']);
		// exécute la requête préparée avec les marqueurs de positionnement
		$req->execute($params);

	}
	
	/**
	 * Supprime un article de la base de données
	 * 
	 * @param Article $article        	
	 */
	public function remove(Article $article) {
		$sql = "DELETE FROM article WHERE id = " . $article->id;
		$query = $this->_pdo->query($sql);
	}
}