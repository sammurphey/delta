<?php
$login_msg = false;
if (empty($_REQUEST) === false) {
	$username_input = addslashes($_REQUEST["username"]);
	$password_input = addslashes($_REQUEST["password"]);
	$attempt = xhrFetch("delta?action=login&username=" . $username_input . "&password=" . $password_input);
	if ($attempt["success"] !== false) {
		$isLoggedIn = true;
		
		setcookie("user_name", $username_input, time() + (86400 * 30), "/");
		setcookie("user_token", $attempt["data"], time() + (86400 * 30), "/");
		require_once($php_root . "core/router.php");
	} else {
		$login_msg = "Incorrect username or password.";
		jsLogs("login failed");
	}
}
if (!$isLoggedIn) {
	require_once($php_root . "components/html/header.php");
	echo "<h1>Login</h1>";
	if ($login_msg) {
		echo "<p class='error_msg'>" . $login_msg . "</p>";
	}
	echo "<form action='" . $htp_root . "' method='POST'>";
		echo "<div class='field'>";
			echo "<label for='username'>Username</label>";
			echo "<input id='username' name='username' type='text' />";
		echo "</div>";
		echo "<div class='field'>";
			echo "<label for='password'>Password</label>";
			echo "<input id='password' name='password' type='password' />";
		echo "</div>";
		echo "<div class='field'>";
			echo "<input id='login' type='submit' value='Login' />";
		echo "</div>";
	echo "</form>";
	require_once($php_root . "components/html/footer.php");
}
