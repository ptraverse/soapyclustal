<?php

/*
 * BEGIN STANDARD STUFF
*/

echo '<html>';
echo '<head>';
echo '<title>Spec of needleman-wunsch</title>';
echo '<link href="../gui/base.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

/*
 * END STANDARD STUFF
*/

//Title
echo '<div id="title"><h1>Needleman-Wunsch';
echo '</h1>';
echo '<sub><a href="../nw_client/client.php">example</a></sub>';
echo '</div>';
echo '<hr>';

//SOAP
echo "<h1>SOAP Client</h1>";
echo '<div class="code">';
echo '<pre>';
echo '
$sClient = new SoapClient("http://localhost/new_soapy/nw_server/nw.xml");


$sequence_a = "ATGC";
$sequence_b = "AGCC";		
$response = $sClient->global_alignment($sequence_a,$sequence_b);


echo $response[\'seq1\'][0]; //A
echo $response[\'seq1\'][1]; //T
echo $response[\'seq1\'][2]; //G
echo $response[\'seq1\'][3]; //C
		
echo $response[\'seq2\'][0]; //A
echo $response[\'seq2\'][1]; //G
echo $response[\'seq2\'][2]; //C
echo $response[\'seq2\'][3]; //C
		
echo $response[\'seq1\'][0]; //|
echo $response[\'seq1\'][1]; //
echo $response[\'seq1\'][2]; //
echo $response[\'seq1\'][3]; //|
		
echo $response[\'score\']; //2		
';
echo '</pre>';
echo "</div>";
echo "<hr>";

//HTTP GET Request/Response
echo '<h1>HTTP - GET</h1>';
echo '<h2>Request</h2>';
echo '<div>';
echo '<pre>';
echo 'http://localhost/new_soapy/nw_server/httpget_server.php?sequence_a=AGTC&sequence_b=AGCC';
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


//HTTP POST Request/Response
echo '<h1>HTTP - POST</h1>';
echo '<h2>Request</h2>';
echo '<div>';
echo '<pre>';
echo 'http://localhost/new_soapy/helloworld_server/httppost_server.php

yourName=World!';
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