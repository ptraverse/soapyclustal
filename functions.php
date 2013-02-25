<?php


function log_ip()
{
	$remote_ip_address="fooip";
	
	$mysqli = new mysqli("localhost", "", "", "test");
	
	$ip_log_query = "
		INSERT INTO ip_log (
			`file`,
			`date_inserted`,
			`ip_address`
		) VALUES (
			'".__FILE__."',
			'".date("Y-m-d H:i:s")."',
			'".$remote_ip_address."')
		";
	$res = $mysqli->query($ip_log_query);
	
	$all_ready = (!empty($remote_ip_address) && $mysqli->connect_errno==FALSE);
	
	if ($all_ready)
	{
		return TRUE;
	}
	else 
	{
		echo $mysqli->connect_errno;
		return FALSE;
	}
}

?>