<?php

require_once "navigation_item.class.php";

class LeftNavigationItem extends NavigationItem {


	public function __construct($name, $target) {
		parent::__construct($name, $target);
		$this->html = "<li class='mainlink'>- <a href='index.php?id={$target}'>{$name}</a></li>";
	}


	public function __toString(){
		return parent::__toString();
	}

}


?>