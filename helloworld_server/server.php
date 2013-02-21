<?php 

/**
 * Placeholder for the hello world soap server
 */

if(!extension_loaded("soap"))
{
	dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("http://localhost/new_soapy/helloworld_server/hello.xml");

function doHello($yourName)
{
	echo __FILE__.":".__LINE__;
	return "Hello, ".$yourName;
}

$server->AddFunction("doHello");
$server->handle();


?>