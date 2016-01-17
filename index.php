<?php

include "site.class.php";

echo "hello world";

$site = new Site("hello");


echo $site->getName();
echo($site->getContent());

?>
