<?php

class View {
	
	public function render ($template, $params) {
		//TODO : ajouter de la sécurité
		foreach ($params as $key => $value) {
			$$key = $value ;
		}
		//echo print_r($params);
		include("views/" . $template . ".view.php");
	}
}

