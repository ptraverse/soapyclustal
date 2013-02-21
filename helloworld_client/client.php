<?php
try{
  $sClient = new SoapClient('http://localhost/new_soapy/helloworld_server/hello.xml');
  
  $params = "World!";
  $response = $sClient->doHello($params);
  
  var_dump($response);
  echo $response;
  
} catch(SoapFault $e){
	echo __FILE__.":".__LINE__;
  var_dump($e);
}
?>