<?php

class ModHistorique{


	private $controller;
	private $action;
	private $vue;
	private $modele;
	private $niveau;

	public function __construct(){
		$action = isset($_GET['action']) ? $_GET['action'] : 'pageNiveau';
		$niveau = isset($_GET['niveau']) ? $_GET['niveau'] : 1;

		$vue = new VueHistorique();
		$modele = new ModeleHistorique();
		$this->controller = new ControllerHistorique($vue, $modele); 
	
		
		
		switch ($action) {
			case 'pageNiveau':
				$niv = $this->niveau;
				$this->controller->afficherPartieNiveau($niv);
				break;
			default : break;
		}
	}
}


?>



