<?php
// Enable Error Reporting
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Init variables
$php_root = $_SERVER['DOCUMENT_ROOT'] . "/delta/";
$htp_root = "http://192.168.0.107/delta/";
$api_root = "https://api.sammurphey.net/";
$cdn_root = "https://cdn.sammurphey.net/v2/";

// Defaults
$document_title = "Delta Respository";
$document_url = $htp_root;
$last_updated = "2018/10/30";
$version = 1.0;
// Functions
function valExists($key, $arr) {
	if (is_array($arr)) {
		if (array_key_exists($key, $arr) && $arr[$key]) {
			return true;
		}
		return false;
	}
	return false;
}
function xhrFetch($url, $params = false) {
	if (strpos($url, 'http') == false) {
		$xhr_url = "https://api.sammurphey.net/" . $url;

	} else {
		$xhr_url = $url;
	}
	jsLogs("xhrFetching: " . $xhr_url);
	$xhr_res = "";
	//if (function_exists("curl_init")) {
	//	$ch = curl_init();
	  //  curl_setopt($ch, CURLOPT_URL, $url);
	    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   // $xhr_res = curl_exec($ch);
	   // curl_close($ch);
	//} else {
		$xhr_res = file_get_contents($xhr_url);
	//}
	if (strlen($xhr_res) > 0) {
		$xhr_first = substr($xhr_res, 0, 1);
		if ($xhr_first == "{" || $xhr_first == "[") {
			$xhr_json = json_decode($xhr_res, true);
			if (is_array($xhr_json)) {
				return $xhr_json;
			} else {
				return $xhr_res;
			}
		}
		return $xhr_res;
	} else {
		return false;
	}
}
function jsLogs($data) {
    $html = "";
    $coll;

    if (is_array($data) || is_object($data)) {
        $coll = json_encode($data);
    } else {
        $coll = $data;
    }

    $html = "<script>console.log('PHP: ".$coll."');</script>";

    echo($html);
    # exit();
}jsLogs("hello world");
// Find where we are
require_once($php_root . "core/headers.php");

// Verify user
$isLoggedIn = false;
require_once($php_root . "core/checkLogin.php");
?>
