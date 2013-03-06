<?php


$ed1 = array(
	"Name"=>"HelloWorld",
	"Language"=>"php",
	"Example"=>'<a href="./helloworld_client/client.php">Link</a>',
	"Spec"=>'<a href="./spec/helloworld.php">Link</a>');
$ed2 = array(
	"Name"=>"NW",
	"Language"=>"php",
	"Example"=>'<a href="./nw_client/client.php">Link</a>',
	"Spec"=>'<a href="./spec/nw.php">Link</a>');
$ed3 = array(
		"Name"=>"NW-Advanced",
		"Language"=>"php",
		"Example"=>'<a href="./nwa_client/client.php">Link</a>',
		"Spec"=>'<a href="./spec/nwa.php">Link</a>');
$ed4 = array("Name"=>"Viterbi","Language"=>"c#","Example"=>"link","Spec"=>"link");
$example_data = array($ed1, $ed2, $ed3,$ed4);




echo '<div style="width: 400px; text-align: center; margin-left:auto; margin-right: auto;margin-top: 76px;">';
echo array_to_html_grid($example_data);
echo '</div>';

/**
* input_array: assoc 2d array
* output: html grid
**/
function array_to_html_grid($input_array)
{
	$counter = 0;
	$html = "<table border=1><tr>";
	foreach($input_array[0] as $k=>$v)
	{
	
		$html .= "<th>".$k."</th>";
		
	}
	$html .= "</tr>";
	foreach ($input_array as $k=>$v)
	{
		$html .= "<tr>";
		foreach ($v as $k2=>$v2)
		{
			$html .= "<td>".$v2."</td>";
		}
		$html .= "</tr>";
	}
	$html .= "</table>";
	return $html;	
}

?>
