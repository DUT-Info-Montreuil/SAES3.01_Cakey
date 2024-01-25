<?php 
    class ControllerAccueil{ 

        private $vue;

        public function __construct(VueAccueil $vue){
            $this->vue = $vue;
        }

        public function pageAccueil(){
            $this->vue->page();	  
        }
    }