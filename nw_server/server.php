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


function global_alignment($sequence_a,$sequence_b)
{
	
	$nw = new NeedlemanWunsch(1, 0, -1);
	ob_start();
	$nw->compute($sequence_a, $sequence_b);
	print_r($nw->getOptimalGlobalAlignment());
	$content = ob_get_clean();
	
	return $content;
}

function example($sequence_a,$sequence_b)
{
	$nw = new NeedlemanWunsch(1, 0, -1);
	ob_start();
	$nw->compute($sequence_a, $sequence_b);
	$nw->renderAsHTML($sequence_a, $sequence_b);
	$content = ob_get_clean();
	
	return $content;
}

$server->AddFunction("global_alignment");
$server->AddFunction("example");
$server->handle();


?>