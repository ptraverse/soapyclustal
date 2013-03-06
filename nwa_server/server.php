<?php 

/**
 * Placeholder for the hello world soap server
 */

if(!extension_loaded("soap"))
{
	dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("http://localhost/new_soapy/nw_server/nw.xml");

require_once('../needleman-wunsch/needleman-wunsch-class.php');


function global_alignment($sequence_a_url,$sequence_b_url)
{
	$fha = fopen($sequence_a_url,'r');
	$sequence_a = fgets($fha);
	fclose($fha);
	
	$fhb = fopen($sequence_b_url,'r');
	$sequence_b = fgets($fhb);
	fclose($fhb);
	
	$nw = new NeedlemanWunsch(1, 0, -1);
	
	$nw->compute($sequence_a, $sequence_b);
	$result = $nw->getOptimalGlobalAlignment();
	
	$content = $result['score'];
	
	return $content;
}

function example($sequence_a_url,$sequence_b_url)
{
	$fha = fopen($sequence_a_url,'r');
	while ($line = fgets($fha))
	{
		$sequence_a .= $line;
	} 
	fclose($fha);
	
	$fhb = fopen($sequence_b_url,'r');
	while ($line = fgets($fhb))
	{
		$sequence_b .= $line;
	}
	fclose($fhb);
	
	$nw = new NeedlemanWunsch(1, 0, -1);
	ob_start();
	//$nw->compute($sequence_a, $sequence_b);
	//$nw->renderAsHTML($sequence_a, $sequence_b);
	echo "<pre>";
	echo $sequence_a;
	echo "\n";
	echo $sequence_b;
	echo "</pre>";
	$content = ob_get_clean();
	
	return $content;
}

$server->AddFunction("global_alignment");
$server->AddFunction("example");
$server->handle();


?>