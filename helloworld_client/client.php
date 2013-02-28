<?php

/*
 * BEGIN STANDARD STUFF
*/

echo '<html>';
echo '<head>';
echo '<title>Example of helloworld</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

/*
 * END STANDARD STUFF
*/

try{
  $sClient = new SoapClient("http://localhost/new_soapy/helloworld_server/hello.xml");
  
  //Title
  echo '<div id="title"><h1>Hello, World!';
  echo '</h1>';
  echo '<sub><a href="../spec/helloworld.php">Spec</a></sub>';
  echo '</div>';
  echo '<hr>';
  
  //Body
  echo "<h1>Input</h1>";
  
  if (empty($_GET['yourName']))
  {
  		$params = "World";
  }
  else
  {
  		$params = $_GET['yourName'];
  }
  print_r($sClient->__getFunctions());
  print_r($sClient->__getTypes());
  $response = $sClient->doHello($params);
  
  echo '<form action="client.php">';
  echo 'yourName: <input placeholder="'.$params.'" name="yourName" type="text">';
  echo '<input type="submit" value="Submit">';
  echo "<hr>";
  
  echo "<h1>Output</h1>";
  echo "<pre>";
  var_dump($response);
  echo "</pre>";
  echo "<hr>";
  
  echo '<h1>Description</h1>';
  echo "The hello world service is meant as both a demonstration and a template for the other web based services in the project scope.";
  
} catch(SoapFault $e){
	echo __FILE__.":".__LINE__;
  var_dump($e);
}
?>