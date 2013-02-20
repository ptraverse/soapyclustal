<?php
try{
  $sClient = new SoapClient('http://localhost/soapyclustal_new/helloworld_sever/server.xml');
  
  $params = "Aqila";
  $response = $sClient->doHello($params);
  
  var_dump($response);
  
  
} catch(SoapFault $e){
  var_dump($e);
}
?>
