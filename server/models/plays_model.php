<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Plays_model extends CI_Model {
		private $plays = array(); //array of each play
		private $roles = array(); //array of each roles
		
    	function __construct()
    	{
        	parent::__construct();
			
			//parse all XML files in /data
			$this->load->helper('directory');
			$this->load->helper('file');
			$map = directory_map('./data/');
			foreach ($map as $file) {
			  	$string = read_file('./data/'.$file);
				//clean up ampersands in raw data
				$string = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $string);
				// $xmlPlay = new SimpleXMLElement($string);
				$xml = simplexml_load_string($string, "SimpleXMLElement", LIBXML_NOERROR |  LIBXML_ERR_NONE | LIBXML_NOWARNING);
			
				//var_dump($totalScenes);
				$json = json_encode($xml);
				$array = json_decode($json);
				//var_dump($array);
				
				//var_dump($xmlPlay);
				//var_dump($xmlPlay->TITLE);
				//$this->plays = $xmlPlay->TITLE;
				$key = preg_split('/[.]/', $file)[0];
				$totalScenes = count($xml->xpath('ACT/SCENE'));
				//var_dump($totalScenes);
				foreach ($array->ACT as $act) {
					//var_dump($act->TITLE);
					foreach ($act->SCENE as $scene) {
						//$sceneCounter = array(); //reset each new scene
						$sceneName = $scene->TITLE;
						//var_dump($sceneName);
						//var_dump(sizeof($scene));
						foreach ($scene->SPEECH as $speech) {
							try {
								if (isset($speech->SPEAKER)) {
									$speaker = $speech->SPEAKER;
									if (is_string($speaker)) { //Sometimes this is not a string
										if (array_key_exists($speaker,$this->roles)) {
											//Update existing role
											$role = $this->roles[$speaker];
											//var_dump($role);
											$roleScenes = $role['scenes'];
											if (!array_key_exists($sceneName,$roleScenes)) {
												//array_push($roleScenes,$sceneName);
												$roleScenes[$sceneName] = $sceneName;
												$role['numberScenes'] = sizeof($roleScenes);
												$role['percentScenes'] = round(sizeof($roleScenes) / $totalScenes * 100, 2);
											}
								
											$currentLongestSpeech = $role['longestSpeech'];
											if ($currentLongestSpeech < sizeof($speech->LINE) ) {
												$role['longestSpeech'] = sizeof($speech->LINE);
											}
											$this->roles[$speaker]=$role;
										} else {
											//Found a new role
											$roleScenes[$sceneName] = $sceneName;
											$role = array('name' => $speaker, 'longestSpeech' => sizeof($speech->LINE), 'scenes' => $roleScenes, 'numberScenes' => 1, 'percentScenes' => round(1/$totalScenes*100,2));
											$this->roles[$speaker]=$role;
										}
									} else {
										//ignore if no speaker
										//var_dump($speaker);
									}
								} else {
									//var_dump($speech);
								}
							} catch (Exception $e) { //ignore parsing errors for now
							}
						}
					}
					//var_dump($role);
					// foreach ($role->PERSONA as $persona) {
					// 						array_push($roles,$persona);
					// 					}
					// foreach ($role->PGROUP as $group) {
					// 						array_push($roles,$group->PERSONA);
					// 					}
				}
				//var_dump($roles);
				//$params['xmlPlay'] = $xmlPlay;
				
				//$play = $this->load->library('Play_model',$params);
				//$this->plays[$key] = $xmlPlay->PERSONAE->PERSONA[1];
			}
    	}
		function getPlay($name) {
			//return $this->plays[$name]; //plays[$name];
		}
		function getPlays() {
			//var_dump($this->plays);
			return $this->plays; //plays[$name];
		}
		function getRoles() {
			return $this->roles;
		}
	}
?>