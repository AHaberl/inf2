<?php

include "site.class.php";
include "navigation.class.php";


if(isset($_GET["id"])){
	$id = $_GET["id"];
} else {
	$id = 4;
}

$site = new Site($id);
echo $site->getName();
print("<br>");
echo $site->getParent();
print("<br>");

$topNavi = new Navigation("topnavi", -1);

print("topnavi: <br>");

echo($topNavi->getName());
print("<br>");

foreach($topNavi->getItems() as $item) {
	print($item . " target: " . $item->getTarget());
	print("<a href='index.php?id=" . $item->getTarget() . "'>" . $item . "</a>");
	print("<br>");
}

print("<br><br>");

if($site->getParent() == -1){	
	print("Second Navi: <br>");
	$sideNavi = new Navigation("sidenavi", $site->getId());
	echo($sideNavi->getName());
	print("<br>");
	foreach($sideNavi->getItems() as $item) {
		print($item . " target: " . $item->getTarget());
		print("<a href='index.php?id=" . $item->getTarget() . "'>" . $item . "</a>");
		print("<br>");
	}
	print("<br>");
} else {
	print("Second Navi: <br>");
	$sideNavi = new Navigation("sidenavi", $site->getParent());
	echo($sideNavi->getName());
	print("<br>");
	foreach($sideNavi->getItems() as $item) {
		print($item . " target: " . $item->getTarget());
		print("<a href='index.php?id=" . $item->getTarget() . "'>" . $item . "</a>");
		print("<br>");
	}
	print("<br>");
}

print("site: <br>");

echo($site->getContent());

?>
