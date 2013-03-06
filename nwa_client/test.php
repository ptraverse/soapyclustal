<?php

require_once('../needleman-wunsch/needleman-wunsch-class.php');

$sequence_a_url = $_SERVER['DOCUMENT_ROOT']."new_soapy/nwa_client/example_a.fasta";
$sequence_b_url = $_SERVER['DOCUMENT_ROOT']."new_soapy/nwa_client/example_b.fasta";

function global_alignment($sequence_a_url,$sequence_b_url)
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
	
	$sequence_a = stripFirstLine($sequence_a);
	$sequence_b = stripFirstLine($sequence_b);
	
	$nw = new NeedlemanWunsch(1, 0, -1);
	ob_start();
	$nw->compute($sequence_a, $sequence_b);
	$result = $nw->getOptimalGlobalAlignment();
	echo implode("",$result['seq1'])."<br>";
	echo implode("",$result['seq2'])."<br>";
	echo $result['score']."<br>";
	$content = ob_get_clean();

	return $content;
}

function stripFirstLine($text)
{
	return substr( $text, strpos($text, "\n")+1 );
}

echo global_alignment($sequence_a_url, $sequence_b_url);


?>