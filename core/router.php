<?php
switch($current_path) {
	case "":
	case "/":
	// homepage
		if ($user_token) {
			require_once($php_root . "views/dashboard.php");
		}
		break;
	case "logout":
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
