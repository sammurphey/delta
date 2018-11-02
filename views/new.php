<?php
require_once($php_root . "components/html/header.php");
require_once($php_root . "components/main_nav.php");
echo "<main>";
	echo "<h1>New</h1>";
	echo "<article>";
		echo "<form action='" . $htp_root . "new' method='POST'>";
			echo "<section>";
				echo newFormField("title", "Title");
				echo newFormField("description", "Description", "textfield");
				echo newFormField("keywords", "Keywords", "textfield");
				$img_search_icon = xhrFetch($php_root . "src/img/icons/image_search.svg");
				$field_name = "Cover Img " . $img_search_icon;
				echo newFormField("cover_img", $field_name, "photo");
			echo "</section><section>";
				$categories_data = xhrFetch("v3/index.php?table=categories");
				$categories = [];
				$subcategories = [];
				foreach($categories_data as $category_data) {
					switch($category_data["type"]) {
						case "overview":
							$categories[] = $category_data["title"];
							break;
						default:
							$subcategories[] = $category_data["title"];
					}
				}
				echo newFormField("url", "Url");
				echo newFormField("category", "Category", "select", $categories);
				echo newFormField("subcategory", "Subcategory", "select", $subcategories);
			echo "</section><section>";
				echo "<h2>Privacy</h2>";
				echo newFormField("public", "Public", "checkbox");
				echo newFormField("show_in_overview", "Show in Overview", "checkbox");
			echo "</section>";
		echo "</form>";
	echo "</article>";
echo"</main>";
require_once($php_root . "components/html/footer.php");
