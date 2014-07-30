<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Play_model {
		public $title;
		public $roles = array(); //Array of Roles
		
		
    	function __construct($params)
    	{
        	//parent::__construct();
			//var_dump($params);
			$xmlPlay = $params['xmlPlay'];
			$this->title = $xmlPlay->TITLE;
			//var_dump($this->title);
			$xmlRoles = $xmlPlay->PERSONAE->TITLE;
			//var_dump($xmlRoles);
			//foreach ($xmlPlay->xpath('//PERSONA') as $element) {
				//ignore PGROUPs
				//var_dump($);
				//var_dump($element.asXML());
				// if (is_a($role, 'string')) {
				// 					
				//$this->roles[$element] = $element;
				// 				}
			//}
			//var_dump($this->roles);
    	}
		function getRole($name) {
			return $this->roles[$name]; //plays[$name];
		}
		function getRoles() {
			//var_dump($this->roles);
			return $this->roles; //plays[$name];
		}
	}
?>