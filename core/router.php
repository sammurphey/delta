<?php
jsLogs("routing...");
switch($current_path) {
	case "":
	case "/":
	// homepage
		if ($user_token) {//double check
			require_once($php_root . "views/dashboard.php");
		} else {
			require_once($php_root . "views/login.php");
		}
		break;
	case "logout":
		require_once($php_root . "views/logout.php");
		break;
	case "about":
		break;
	case "early-access":
		break;
	case "donate":
		break;
	default:
	// assume username and attempt lookup
}
