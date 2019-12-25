<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('zipcode'))
{
	function zipcode($zipcode, $api_name ,$minimumradius = 0 , $maximumradius = 50)
	{
		$api_key = '9PKSGFT1WQXMCX8M8T4B';
		$baseurl = 'https://api.zip-codes.com/ZipCodesAPI.svc/1.0/';
		// https://api.zip-codes.com/ZipCodesAPI.svc/1.0/FindZipCodesInRadius?zipcode=10001&minimumradius=0&maximumradius=50&key=5H11QE652OVGV8LMSHXI
		// https://api.zip-codes.com/ZipCodesAPI.svc/1.0/FindZipCodesInRadius?zipcode=10000&minimumradius=0&maximumradius=50&key=5H11QE652OVGV8LMSHXI


		// $api_name = 'FindZipCodesInRadius?';
		if ($api_name == 'FindZipCodesInRadius?') {
			$url = $baseurl.$api_name.'zipcode='.$zipcode.'&minimumradius='.$minimumradius.'&maximumradius='.$maximumradius.'&key='.$api_key;
		} else if ($api_name == 'QuickGetZipCodeDetails') {
			$url = $baseurl.$api_name.'/'.$zipcode.'?key='.$api_key;
		// https://api.zip-codes.com/ZipCodesAPI.svc/1.0/QuickGetZipCodeDetails/90210?key=DEMOAPIKEY

		} else {
			exit;
		}
		// $CI =& get_instance();
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);
		// $result = file_get_contents($url);
		$result = preg_replace(
					  '/
					    ^
					    [\pZ\p{Cc}\x{feff}]+
					    |
					    [\pZ\p{Cc}\x{feff}]+$
					   /ux',
					  '',
					  $result
					);
		// Will dump a beauty json :3
		return json_decode($result,true);
	}
}