<?php
$login_msg = false;
if (empty($_REQUEST) === false) {
	jsLogs("checking login credentials");
	$username_input = addslashes($_REQUEST["username"]);
	$password_input = addslashes($_REQUEST["password"]);
	jsLogs("un: " . $username_input);
	jsLogs("pw: " . $password_input);
	$attempt_url = "delta?action=login&username=" . $username_input . "&password=" . $password_input;
	$attempt = xhrFetch($attempt_url);
	if ($attempt["success"] !== false) {
		jsLogs("correct username + password");
		$isLoggedIn = true;
		$returnedToken = $attempt["data"];
		jsLogs($attempt["data"]);
		setcookie("user_name", $username_input, time() + (86400 * 30), "/");
		setcookie("user_token", $returnedToken, time() + (86400 * 30), "/");
		require_once($php_root . "core/router.php");
	} else {
		$login_msg = "Incorrect username or password.";
		jsLogs("Incorrect username or password.");
	}
}
if (!$isLoggedIn) {
	jsLogs("requires login");
	require_once($php_root . "components/html/header.php");
	echo "<h1>Login</h1>";
	if ($login_msg) {
		echo "<p class='error_msg'>" . $login_msg . "</p>";
	}
	echo "<form action='" . $htp_root . "' method='POST'>";
		echo newFormField("username", "Username");
		echo newFormField("password", "Password", "password");
		echo newFormField("login", "Login", "submit", "Login");
	echo "</form>";
	require_once($php_root . "components/html/footer.php");
}
