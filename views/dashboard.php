<?php
jsLogs("logged in successfully");
require_once($php_root . "components/html/header.php");
require_once($php_root . "components/main_nav.php");
echo "<main>";
	echo "<h1>Dashboard</h1>";
	echo "<article>";
		echo "<a href='" . $htp_root . "new'><button class='fab'>+</button></a>";
	echo "</article>";
echo"</main>";
require_once($php_root . "components/html/footer.php");
