<?php
// for the service WSDL
$wsdlUrl = 'http://www.ebi.ac.uk/ws/services/WSDbfetch?wsdl';
 
try {
  // Get a service proxy from the WSDL
  $proxy = new SoapClient($wsdlUrl);
 
  // Call a method on the service via the proxy
  $result = $proxy->fetchData('UNIPROT:ADH1A_HUMAN', 'fasta', 'raw');
  echo $result;
  echo "<hr>";
  $result = $proxy->__getFunctions();
  echo "<pre>";
  print_r($result);
  echo "</pre>";
  $result = $proxy->fetchData('UNIPROT:ACUK_AJECN','fasta','raw');
  echo "<hr><pre>";
  print_r($result);
  echo "</pre>";

  $result = $proxy->__getFormats();
  echo "<hr><pre>";
  print_r($result);
  echo "</pre>";
  
}
catch(SoapFault $ex) {
  echo 'Error: ';
  if($ex->getMessage() != '') echo $ex->getMessage();
  else echo $ex;
  echo "\n";
}

?>
