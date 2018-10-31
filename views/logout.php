<?php
if ($user_name) {
	setcookie("user_name", "logged_out", time() + 10, "/");
}
if ($user_token) {
	setcookie("user_token", "logged_out", time() + 10, "/");
}
header("Location: " . $htp_root);
die();
