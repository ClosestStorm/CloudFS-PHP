<?php

/**
 * Bitcasa Client PHP SDK
 * Copyright (C) 2014 Bitcasa, Inc.
 *
 * This file contains an SDK in PHP for accessing the Bitcasa infinite drive.
 *
 * For support, please send email to support@bitcasa.com.
 */

abstract class BitcasaUtils {

	public static function isSuccess($status) {
		return $status >= 200 && $status < 300;
	}
	
	public static function getRequestUrl($credential, $request, $method = NULL, $queryParams = NULL) {
		$url = BitcasaConstants::HTTPS;
		$url .= $credential->getEndPoint();
		$url .= BitcasaConstants::API_VERSION_2;
		$url .= $request;
		
		if ($method != null)
			$url .= $method;
		
		if ($queryParams != null) {
			$url .= "?";
			$url .= BitcasaUtils::generateParamsString($queryParams);
		}
		
		return $url;
	}


  	public static function generateParamsString($params) {
		$paramsString = "";
		$first = true;
  		if ($params != null && count($params) > 0) {
			foreach ($params as $key => $value) {
				if ($first == true) {
					$first = false;
				} else {
					$paramsString .= "&";
				}
  				$paramsString .= $key . "=" . BitcasaUtils::replaceSpaceWithPlus($value);
  			}
  		}
  		return $paramsString;
  	}
  	
	public static function replaceSpaceWithPlus($s) {
		return str_replace(" ", "+", $s);
	}

	public static function hex2base64($hex) {
		return base64_encode(pack("H*", $hex));
	}

	
	public static function sha1($s, $secret)  {
		return BitcasaUtils::hex2base64(hash_hmac('sha1', $s, $secret));
	}
	

	public static function generateAuthorizationValue($session, $uri, $params, $date) {
		$stringToSign ="";
		$stringToSign .= BitcasaConstants::REQUEST_METHOD_POST . "&" . $uri . "&" . $params . "&";
		$stringToSign .= BitcasaUtils::replaceSpaceWithPlus(urlencode(BitcasaConstants::HEADER_CONTENT_TYPE)) . ":";
		$stringToSign .= BitcasaUtils::replaceSpaceWithPlus(urlencode(BitcasaConstants::FORM_URLENCODED)) . "&";
		$stringToSign .= BitcasaUtils::replaceSpaceWithPlus(urlencode(BitcasaConstants::HEADER_DATE)) . ":";
		$stringToSign .= BitcasaUtils::replaceSpaceWithPlus(urlencode($date));

		$authorizationValue = "BCS " . $session->getClientId() . ":";
		$authorizationValue .= BitcasaUtils::sha1($stringToSign, $session->getClientSecret());
		
		return $authorizationValue;
	}

}
?>
