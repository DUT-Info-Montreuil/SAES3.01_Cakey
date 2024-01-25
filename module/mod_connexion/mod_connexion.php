<?php

// if (!defined("BASE_URL")) {
//     die("il faut passer par l'index");
// }

class ModConnexion{


	private $controller;
	private $action;
	private $vue;
	private $modele;

	public function __construct(){
		$action = isset($_GET['action']) ? $_GET['action'] : 'formulaireConnexion';

		$vue = new VueConnexion();
		$modele = new ModeleConnexion();
		$this->controller = new ControllerConnexion($vue, $modele); 
	
		
		
		switch ($action) {
			case 'formulaireInscription':
				$this->controller->formulaireInscription();
				break;
			case 'inscription':
				$this->controller->inscription();
				break;
			case 'formulaireConnexion' :
				$this->controller->formulaireConnexion();
				break;
			case 'connexion':
				$this->controller->connexion();
				break;
			case 'deconnexion' :
				$this->controller->deconnexion();
				break;
			default : break;
		}
	}
}


?>



