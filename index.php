<html>
<body>

<!--
<h1>It Works!</h1>
<p>This is the default web page for this server.</p>
<p style="text-decoration: line-through;">The web server software is running but no content has been added, yet.</p>
<pre>POST first commit -m on git at 10pm </pre>
<pre>Added PHP Server at 10:40pm</pre>
-->
<p>
<h1>
Hi, my name is Philippe Traverse.
</h1>
<h2>Welcome to my website.
</h2>
<p>I am using this website to keep track of my side projects and demonstrate what I am teaching myself outside of work. This includes:
<li>Usage of Amazon AWS Cloud Computing (this is running off of an AWS EC2 Micro Instance)</li>
<li>Usage of Git (at work I use CVS) and GitHub</li>
<li>Understanding and gaining experience with bioinformatics tools</li>
</p>
<p>My interest is in <a href="http://traversep.wordpress.com/">renewable energy</a>.</p>
<p>My github is <a href="https://github.com/ptraverse">ptraverse</a>.</p>
<p>My resume is not uploaded yet but will be soon...</p>
<p><a href="./grid.php">grid</a></p>
<p><a href="./spec_template.php">spec template</a></p>
<hr>
<p><a href="./helloworld_client/client.php">helloworld soap</a></p>
<?php

require_once('functions.php');
//echo "helloworld in PHP!";
ob_start();

echo '<a href="./needleman-wunsch/example.php">';
echo '<h2>';
echo 'NW';
echo '</h2>';
echo '</a>';
echo '<p>This page is a demo and visualization of the Needleman Wunsch algorithm.</p>';

echo '<hr>';

echo '<a href="./needleman-wunsch/soapyclustal.php">';
echo '<h2>';
echo 'soapyclustalW';
echo '</h2>';
echo '</a>';
echo '<p>This page makes calls to the soap server below and displays the result as an example.</p>';

//echo '<br>';

echo '<p>The following pages all demonstrate usage of the EMBL-EMI Soap Services linked to ClustalW.</p>';

echo '<a href="/needleman-wunsch/iprscan_web_php_soap.php">';
echo '<h2>';
echo 'iprscan_web_php_soap.php';
echo '</h2>';
echo '</a>';

echo '<a href="/needleman-wunsch/ncbiblast_web_php_soap.php">';
echo '<h2>';
echo 'ncbiblast_web_php_soap.php';
echo '</h2>';
echo '</a>';

echo '<a href="/needleman-wunsch/wsdbfetch_web_php_soap.php">';
echo '<h2>';
echo 'wsdbfetch_web_php_soap.php';
echo '</h2>';
echo '</a>';

echo '<a href="/needleman-wunsch/wsdbfetch_web_php_soap.php?database=uniprotkb&id=INSR_HUMAN&format=fasta&style=default">';
echo '<h2>';
echo 'wsdbfetch_web_php_soap Example';
echo '</h2>';
echo '</a>';


echo '<a href="/needleman-wunsch/wsdbfetch_web_php_soap.php?info=database">';
echo '<h2>';
echo 'wsdbfetch_web_php_soap Databases Available';
echo '</h2>';
echo '</a>';

echo '<hr>';

if (log_ip(__FILE__)!=TRUE)
{
	echo '<pre>log_ip() error!</pre>';
}

$previous_records = check_ip_log(get_remote_ip(),__FILE__);
if (empty($previous_records))
{
	echo 'Welcome newcomer<br>';
}
else
{
	echo 'Welcome back - your last visit was '.$previous_records['last_visit'].'<br>';
}

$contents = ob_get_contents();
ob_end_clean();
echo $contents;

?>

</body></html>
