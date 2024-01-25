<?php


class ModAccueil{


	private $controller;
	private $action;
	private $vue;

	public function __construct(){
		$this->action = isset($_GET['action']) ? $_GET['action'] : 'page';

		$this->vue = new VueAccueil();
		//$this->controller = new ControllerAccueil($this->vue); 
	
		
		
		switch ($this->action) {
			case 'page':
				$this->vue->page();
				break;
			default : break;
		}
	}
}


?>



