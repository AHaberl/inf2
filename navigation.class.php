<?php

require "navigation_item.class.php";

class Navigation {
	
	/*private static $query_getNavigation = "SELECT * FROM navigations WHERE name = ?";
	private static $query_navigationTypes = "s";*/

	private static $query_getNavigationItems = "SELECT name, id FROM sites WHERE parent = ?";
	private static $query_itemsTypes = "i";


	private $name;
	private $identifier;
	private $items = array();


	public function __construct($name, $parent) {
		$this->name = $name;
		$this->db = new Db();
		
        $this->loadNavigationItems($parent);

	}


	private function loadNavigationItems($parent) {
		$parentArray = array($parent);

		try {
			$result = $this->db->getValues(Navigation::$query_getNavigationItems, $parentArray, Navigation::$query_itemsTypes);
		
			for($i = 0; $i < count($result); $i++) {
				$row = $result[$i];
				$navigation_item = new NavigationItem($row['name'], $row['id']);
				array_push($this->items, $navigation_item);
			}

		} catch (Exception $e) {
			print("error in sql call");
		}
	}


	public function getName() {
		return $this->name;
	}


	public function getItems() {
		return $this->items;
	}


}

?>