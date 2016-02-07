<?php

class NavigationItem {
	
	private $name;
	private $target;
	

	public function __construct($name, $target) {
        $this->name = $name;        
        $this->target = $target;
    }


	public function getName() {
		return $this->name;
	}	


	public function getTarget() {
		return $this->target;
	}


	public function __toString() {
		return $this->name;
	}

}

?>