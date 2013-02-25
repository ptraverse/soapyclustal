<?php


function log_ip($file)
{
	$remote_ip_address="fooip";
	$remote_ip_actual = get_remote_ip();
	
	if (empty($remote_ip_actual))
	{
		$remote_ip_address = "fooerr";
	}
	else
	{
		$remote_ip_address = $remote_ip_actual;
	}
	
	
	$mysqli = new mysqli("localhost", "", "", "test");
	
	$ip_log_query = "
		INSERT INTO ip_log (
			`file`,
			`date_inserted`,
			`ip_address`
		) VALUES (
			'".$file."',
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


/**
 * from http://www.laughing-buddha.net/php/remoteip
 * @return unknown
 */
function get_remote_ip()
{

	// check to see whether the user is behind a proxy - if so,
	// we need to use the HTTP_X_FORWARDED_FOR address (assuming it's available)

	if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
		
	{
	
		if (strlen($_SERVER["HTTP_X_FORWARDED_FOR"]) > 0) {
	
			// this address has been provided, so we should probably use it
	
			$f = $_SERVER["HTTP_X_FORWARDED_FOR"];
	
			// however, before we're sure, we should check whether it is within a range
			// reserved for internal use (see http://tools.ietf.org/html/rfc1918)- if so
			// it's useless to us and we might as well use the address from REMOTE_ADDR
	
			$reserved = false;
	
			// check reserved range 10.0.0.0 - 10.255.255.255
			if (substr($f, 0, 3) == "10.") {
				$reserved = true;
			}
	
			// check reserved range 172.16.0.0 - 172.31.255.255
			if (substr($f, 0, 4) == "172." && substr($f, 4, 2) > 15 && substr($f, 4, 2) < 32) {
				$reserved = true;
			}
	
			// check reserved range 192.168.0.0 - 192.168.255.255
			if (substr($f, 0, 8) == "192.168.") {
				$reserved = true;
			}
	
			// now we know whether this address is any use or not
			if (!$reserved) {
				$ip = $f;
			}
	
		}
		
	}

	// if we didn't successfully get an IP address from the above, we'll have to use
	// the one supplied in REMOTE_ADDR

	if (!isset($ip)) {
		$ip = $_SERVER["REMOTE_ADDR"];
	}

	// done!
	return $ip;

}

function check_ip_log($ip_address,$file)
{
	$mysqli = new mysqli("localhost", "", "", "test");

	$check_sql = "
		SELECT
			`date_inserted` AS `last_visit`
		FROM `ip_log`
		WHERE `ip_address` = '".$ip_address."'
			AND `file` = '".$file."'
		ORDER BY `date_inserted` DESC 
		LIMIT 2
		";
	
	$check_res = $mysqli->query($check_sql);
	
	while ($row = $check_res->fetch_assoc())
	{
		$data = $row;
	}	
	
	return $data;
}

?>