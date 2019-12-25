<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('stripev1'))
{
	function stripev1($url, $code = null)
	{
		$client_secret = constant('stripe_secret_key');
		$authorization = "Authorization: Bearer  ".constant('stripe_secret_key');
  		$ch = curl_init();



    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    // $result = curl_exec($ch);
    // curl_close($ch);
    // return json_decode($result);


		$curlConfig = array(
		    CURLOPT_URL            => $url,
		    // CURLOPT_POST           => true,
		    // CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_HTTPHEADER     => array('Content-Type: application/json' , $authorization )
		    // CURLOPT_POSTFIELDS     => array(
		    //     'grant_type' => 'authorization_code',
		    //     'client_secret' => $client_secret,
		    //     'code' => $code,
		    // )
		);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, );
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		curl_close($ch);

		// Will dump a beauty json :3
		return json_decode($result,true);
	}
}