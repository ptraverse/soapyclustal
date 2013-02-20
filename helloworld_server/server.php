<?php 

/**
 * Placeholder for the hello world soap server
 */

if(!extension_loaded("soap"))
{
	dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("hello.wsdl");

function doHello($yourName)
{
	return "Hello, ".$yourName;
}

$server->AddFunction("doHello");
$server->handle();


?>