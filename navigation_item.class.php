<?php

class NavigationItem {
	
	private $title;
	private $position;
	private $target;
	private $parent;

	public function __construct($title, $position, $target, $parent) {
        $this->title = $title;
        $this->position = $position;
        $this->target = $target;
        $this->parent = $parent;
	}


	public function getTitle() {
		return $this->title;
	}


	public function getPosition() {
		return $this->position;
	}


	public function getTarget() {
		return $this->target;
	}


	public function getParent() {
		return $this->parent;
	}


	public function __toString() {
		return $this->title;
	}

}

?>