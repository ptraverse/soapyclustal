<?php 

/*
 * BEGIN STANDARD STUFF
 */

echo '<html>';
echo '<head>';
echo '<title>Spec of helloworld</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

/*
 * END STANDARD STUFF
 */

//SOAP
echo "<h1>SOAP Client</h1>";
echo '<div>';
echo '<pre>';
echo '		
$sClient = new SoapClient("http://localhost/new_soapy/helloworld_server/hello.xml");
		
$params = "World!";
$response = $sClient->doHello($params);
		 
echo $response; //Hello, World!
		
';
echo '</pre>';
echo "</div>";
echo "<hr>";

//HTTP GET Request/Response
echo '<h1>HTTP - GET</h1>';
echo '<h2>Request</h2>';
echo '<div>';
echo '<pre>';
echo 'http://localhost/new_soapy/helloworld_server/httpget_server.php?yourName=World!';
echo '</pre>';
echo '</div>';

echo '<h2>Response</h2>';
echo '<div>';
echo '<pre>';
$response = "Hello, World!";
var_dump($response);
echo '</pre>';
echo '</div>';
echo '<a href="../helloworld_client/client.php">example</a>';
echo '<hr>';


//HTTP POST Request/Response
echo '<h1>HTTP - GET</h1>';
echo '<h2>Request</h2>';
echo '<div>';
echo '<pre>';
echo 'http://localhost/new_soapy/helloworld_server/httpget_server.php?yourName=World!';
echo '</pre>';
echo '</div>';

echo '<h2>Response</h2>';
echo '<div>';
echo '<pre>';
$response = "Hello, World!";
var_dump($response);
echo '</pre>';
echo '</div>';
echo '<hr>';


/**
 * STANDARD END
 */

echo '</body>';
echo '</html>';
?>