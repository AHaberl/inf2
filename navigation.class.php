<?php

require "top_navigation_item.class.php";
require "left_navigation_item.class.php";

class Navigation {
	

	private static $query_getNavigationItems = "SELECT name, id FROM sites WHERE parent = ?";
	private static $query_itemsTypes = "i";


	private $name;
	private $identifier;
	private $items = array();


	public function __construct($name, $parent, $itemType) {
		$this->name = $name;
		$this->db = new Db();
		
        $this->loadNavigationItems($parent, $itemType);

	}


	private function loadNavigationItems($parent, $itemType) {
		$parentArray = array($parent);

		try {
			$result = $this->db->getValues(Navigation::$query_getNavigationItems, $parentArray, Navigation::$query_itemsTypes);
		
			for($i = 0; $i < count($result); $i++) {
				$row = $result[$i];
				$navigation_item = null;
				if($itemType == "top"){
					$navigation_item = new TopNavigationItem($row['name'], $row['id']);
				} elseif($itemType == "left"){
					$navigation_item = new LeftNavigationItem($row['name'], $row['id']);
				}
				array_push($this->items, $navigation_item);
			}

		} catch (Exception $e) {
			print("error in sql call");
		}
	}


	public function __toString(){
		$html = "";
		foreach($this->items as $item) {
			$html .= $item->__toString();
		}
		
		return $html;
	}


	public function isEmpty(){
		return sizeof($this->items) <= 0;
	}


}

?>