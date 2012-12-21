<?php
// for the service WSDL
$wsdlUrl = 'http://www.ebi.ac.uk/ws/services/WSDbfetch?wsdl';
 
try {
  // Get a service proxy from the WSDL
  $proxy = new SoapClient($wsdlUrl);
 
  // Call a method on the service via the proxy
  $result = $proxy->fetchData('UNIPROT:ADH1A_HUMAN', 'fasta', 'raw');
  echo $result;
}
catch(SoapFault $ex) {
  echo 'Error: ';
  if($ex->getMessage() != '') echo $ex->getMessage();
  else echo $ex;
  echo "\n";
}

?>
