<?php

require_once "navigation_item.class.php";

class TopNavigationItem extends NavigationItem {


	public function __construct($name, $target) {
		parent::__construct($name, $target);
		$this->html = "<li><a href='index.php?id={$this->target}'>{$this->name}</a></li>";
	}


	public function __toString(){
		return parent::__toString();
	}

}


?>