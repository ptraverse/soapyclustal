<?php
try{
  $sClient = new SoapClient("http://localhost/new_soapy/helloworld_server/hello.xml");
  
  
  
  echo "<h1>Input</h1>";
  
  if (empty($_GET['yourName']))
  {
  		$params = "World";
  }
  else
  {
  		$params = $_GET['yourName'];
  }
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