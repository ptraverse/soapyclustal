<?php

//echo "<pre>".__FILE__.':'.__LINE__."</pre>";

/*
$get_sql = "
	SELECT
		".__FILE__.':'.__LINE__."
		*
	FROM
		`meta`.`settings`	
	";
$get_res = mysql($get_sql) or die("add some error logging");

while ($row = mysql_fetch_assoc($get_res))
{
	$data[] = $row;
}
*/
$ed1 = array("Name"=>"HelloWorld","Language"=>"php","Spec"=>"link","Source"=>"link");
$ed2 = array("Name"=>"NW","Language"=>"php","Spec"=>"link","Source"=>"link");
$ed3 = array("Name"=>"Viterbi","Language"=>"c#","Spec"=>"link","Source"=>"link");
$example_data = array($ed1, $ed2, $ed3);

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
