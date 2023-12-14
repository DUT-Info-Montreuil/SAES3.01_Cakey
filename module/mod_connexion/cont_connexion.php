<?php
class ControleurConnexion{
	private $modele;
	private $vue;
	private $action;
	
	public function __construct() {
		
	}
	
	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "texte";
		
		switch ($this->action) {
			case "texte" :
				$this->general();
				break;
			default : 
				die ("Action inexistante");
			
		}
	}
	
	private function texte () {
		echo'texte';

	}
	

}
