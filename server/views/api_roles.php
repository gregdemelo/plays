<?php header('content-type: application/json; charset=utf-8');
	//var_dump($roles);
$arr = array(
	'John' => array('name' => 'John','longestSpeech' => 'Hello', 'numberScenes' => 10, 'percentScenes' => 22.2),
	'Steve' => array('name' => 'Steve','longestSpeech' => 'Welcome', 'numberScenes' => 20, 'percentScenes' => 2.2),
	'Mark' => array('name' => 'Mark','longestSpeech' => 'Stuff', 'numberScenes' => 30, 'percentScenes' => 72.2),
	'Timmy' => array('name' => 'Timmy','longestSpeech' => 'Go Home', 'numberScenes' => 40, 'percentScenes' => 0.2),
	'Carol' => array('name' => 'Carol','longestSpeech' => 'Matt Foley', 'numberScenes' => 50, 'percentScenes' => 32.2));

echo $_GET['callback'] . '('.json_encode(array_values($roles)).')';
?>