<?php
require_once($php_root . "components/html/header.php");
require_once($php_root . "components/main_nav.php");
echo "<main>";
	echo "<form action='" . $htp_root . "new' method='POST'>";
		echo newFormField("category", "Category", "select", ["1", "2"]);
		echo newFormField("title", "Title");
	echo "</form>";
echo"</main>";
require_once($php_root . "components/html/footer.php");
