<?php

/*
 * BEGIN STANDARD STUFF
*/

echo '<html>';
echo '<head>';
echo '<title>Example of nw</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

/*
 * END STANDARD STUFF
*/

try{
  $sClient = new SoapClient("http://localhost/new_soapy/nw_server/nw.xml");
  
  //Title
  echo '<div id="title"><h1>Needleman, Wunsch!';
  echo '</h1>';
  echo '<sub><a href="../spec/nw.php">Spec</a></sub>';
  echo '</div>';
  echo '<hr>';
  
  //Body
  echo "<h1>Input</h1>";
  
  if (empty($_GET['sequence_a']))
  {
  		$sequence_a = "ATGC";
  }
  else
  {
  		$sequence_a = $_GET['sequence_a'];
  }
  
  if (empty($_GET['sequence_b']))
  {
  	$sequence_b = "AGCC";
  }
  else
  {
  	$sequence_b = $_GET['sequence_b'];
  }
   
  
  echo '<form action="client.php">';
  echo 'sequence_a: <input placeholder="'.$sequence_a.'" name="sequence_a" type="text"><br>';
  echo 'sequence_b: <input placeholder="'.$sequence_b.'" name="sequence_b" type="text">';
  echo '<input type="submit" value="Submit">';
  echo "<hr>";
  
  echo "<h1>Output</h1>";
  echo "<pre>";
  $response = $sClient->global_alignment($sequence_a,$sequence_b);
  var_dump($response);
  echo "</pre>";
  echo "<hr>";
  
  echo '<h1>Description</h1><sub><a href="http://en.wikipedia.org/wiki/Needleman%E2%80%93Wunsch_algorithm">Wikipedia</a></sub>';
  echo $sClient->example($sequence_a,$sequence_b);
  
  
  
} catch(SoapFault $e){
	echo __FILE__.":".__LINE__;
  var_dump($e);
}
?>