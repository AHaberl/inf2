<?php

require "page.class.php";


if(isset($_GET["id"])){
	$id = $_GET["id"];
} else {
	$id = 1;
}

$page = new Page($id);

print $page->__toString();


?>
