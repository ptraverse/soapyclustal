<html><body><h1>It works!</h1>
<p>This is the default web page for this server.</p>
<p>The FOO web server software is running but no content has been added, yet.</p>
<h1>POST first commit -m on git at 10pm </h1>

<h2>Added PHP Server at 10:40pm</h2>
<?php


echo "helloworld in PHP!";
ob_start();

echo '<a href="/needleman-wunsch/example.php">';
echo '<h2>';
echo 'NW';
echo '</h2>';
echo '</a>';

echo '<a href="/needleman-wunsch/soapyclustal.php">';
echo '<h2>';
echo 'soapyclustalW';
echo '</h2>';
echo '</a>';

echo '<a href="/needleman-wunsch/iprscan_web_php_soap.php">';
echo '<h2>';
echo 'iprscan_web_php_soap.php';
echo '</h2>';
echo '</a>';

$contents = ob_get_contents();
ob_end_clean();
echo $contents;


?>

</body></html>
