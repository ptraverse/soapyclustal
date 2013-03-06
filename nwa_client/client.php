<?php

/*
 * BEGIN STANDARD STUFF
*/

echo '<html>';
echo '<head>';
echo '<title>Example of nw-advanced</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

/*
 * END STANDARD STUFF
*/

try{
  $sClient = new SoapClient("http://localhost/new_soapy/nwa_server/nwa.xml");
  
  //Title
  echo '<div id="title"><h1>Needleman Wunsch (Advanced)';
  echo '</h1>';
  echo '<sub><a href="../spec/nwa.php">Spec</a></sub>';
  echo '</div>';
  echo '<hr>';
  
  //Body
  echo "<h1>Input</h1>";
  
  if (empty($_GET['sequence_a_url']))
  {
  		$sequence_a_url = $_SERVER['DOCUMENT_ROOT']."new_soapy/nwa_client/example_a.fasta";
  }
  else
  {
  		$sequence_a_url = $_GET['sequence_a_url'];
  }
  
  if (empty($_GET['sequence_b_url']))
  {
  		$sequence_b_url = $_SERVER['DOCUMENT_ROOT']."new_soapy/nwa_client/example_b.fasta";
  }
  else
  {
  		$sequence_b_url = $_GET['sequence_b_url'];
  }
   
  
  echo '<form action="client.php">';
  echo 'sequence_a FASTA file location: <input placeholder="'.$sequence_a_url.'" name="sequence_a_url" type="text"><br>';
  echo 'sequence_b FASTA file location: <input placeholder="'.$sequence_b_url.'" name="sequence_b_url" type="text">';
  echo '<input type="submit" value="Submit">';
  echo "<hr>";
  
  echo "<h1>Output</h1>";
  echo "<pre>";
  $response = $sClient->global_alignment($sequence_a_url,$sequence_b_url);
  var_dump($response);
  echo "</pre>";
  echo "<hr>";
  
  echo '<h1>Description</h1><sub><a href="http://en.wikipedia.org/wiki/Needleman%E2%80%93Wunsch_algorithm">Wikipedia</a></sub><br>';
  echo $sClient->example($sequence_a_url,$sequence_b_url);
  
  
  
} catch(SoapFault $e){
	echo __FILE__.":".__LINE__;
  var_dump($e);
}
?>