<?php

class NavigationItem {
	
	protected $name;
	protected $target;
	protected $html;

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
		return $this->html;
	}

}

?>