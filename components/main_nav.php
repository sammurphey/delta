<?php
echo "<header id='main_nav'>";
	echo "<nav><ul>";
		echo "<li><a href='" . $htp_root . "'><button class='header_btn'>";
			echo xhrFetch($php_root . "src/img/icons/apps.svg");
		echo "</button></a></li>";
	echo "</ul></nav>";
	echo "<button id='account_btn' class='header_btn'>";
		echo xhrFetch($php_root . "src/img/icons/account.svg");
	echo "</button>";
echo "</header>";
