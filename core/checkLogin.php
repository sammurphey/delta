<?php
if ($user_name && $user_token) {
	$verification = xhrFetch("delta?action=verify_token&username=" . $user_name . "&token=" . $user_token);
	if ($verification["success"] !== false) {
		require_once($php_root . "core/router.php");
	} else {
		require_once($php_root . "views/login.php");
	}
} else {
	require_once($php_root . "views/login.php");
}
