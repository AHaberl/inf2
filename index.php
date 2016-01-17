<?php

include "site.class.php";
include "navigation.class.php";


$topNavi = new Navigation("topnavi");

print("topnavi: <br>");

echo($topNavi->getName());
print("<br>");

foreach($topNavi->getItems() as $item) {
	print($item);
}

print("<br><br>");
print("Second Navi: <br>");

print("<br>");
print("<br>");
print("site: <br>");

$site = new Site("hello");

echo $site->getName();
print("<br>");
echo($site->getContent());

?>
