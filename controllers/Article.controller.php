<?php

abstract class Controller {
	protected $_model ;
	
	public function __construct(ArticleRepository $model) {
		$this->_model = $model ;
		}
	
	protected function redirect($msg) {
		header("Location: index.php?msg=" . urlencode($msg));
	}

	protected function render($viewName, $params) {
		$view = new View();
		$view->render($viewName, $params);
	}
}

/**
 * Manipuler les articles
 * @author ben
 *
 */
class ArticleController extends Controller {
	
	/**
	 * Afficher les articles
	 * 
	 * @param unknown $articleRepo        	
	 */
	public function indexArticles() {
		$articles = $this->_model->getAll();
		//$articleView->index($articles) ;
		//$this->render('index', $articles);
		$this->render("index", array("articles" => $articles));
	}
	
	/**
	 * Afficher un article grâce à son id
	 * 
	 * @param unknown $articleRepo        	
	 */
	public function readArticle() {
		$id = isset ( $_GET ['id'] ) ? ( int ) $_GET ['id'] : 0;
		if ($id > 0) {
			// aller chercher l'article
			$article = $this->_model->get($id) ;
			$this->render('read', $article) ;
			
			//$articleView->read($article) ;
		}
	}
	
	/**
	 * Ajouter ou modifier un article 
	 * @param unknown $articleRepo
	 */
	public function editArticle() {
		// id est égal à la valeur fournie dans l'url, par exemple "?id=22", sinon, id vaut 0
		$id = isset ( $_GET ['id'] ) ? ( int ) $_GET ['id'] : 0;
		// on crée une instance de l'article correspondant à l'id
		$article = $this->_model->get($id);
		// Si la méthode est POST, on modifie l'article et on redirige vers la page par défaut
		if (isset($_POST['soumis'])) {
			$this->_model->persist($article);
			$this->redirect("L'article a été édité avec succès.") ;
		}
		$this->render('edit', $article);
	}
	
	/**
	 * Supprimer un article de la base
	 * @param unknown $articleRepo
	 * @param unknown $articleView
	 */
	public function deleteArticle() {
		// on récupère le numéro de l'article, et la validation de suppression
		$id = isset ( $_GET ['id'] ) ? ( int ) $_GET ['id'] : 0;
		$del = isset ( $_GET ['del'] ) ? $_GET ['del'] : null;
		
		if ($id > 0) {
			// on récupère le contenu de l'article
			$article = $this->_model->get($id);
		}
		
		if (isset ( $del )) {
			// On supprime l'article
			$this->_model->remove($article);
			// on revient à index.php en renvoyant un message dans l'url
			$msg = "L'article " . $article->titre . " a été supprimé avec succès." ;
			$this->redirect($msg);
		}
		//$articleView->delete($article);
		$this->render('delete', $article);
	}
}

