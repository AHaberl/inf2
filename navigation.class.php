<?php

require "navigation_item.class.php";

class Navigation {
	
	private static $query_getNavigation = "SELECT * FROM navigations WHERE name = ?";
	private static $query_navigationTypes = "s";

	private static $query_getNavigationItems = "SELECT * FROM navigation_items WHERE navigation = ? ORDER BY position";
	private static $query_itemsTypes = "s";


	private $name;
	private $identifier;
	private $items = array();

	public function __construct($name) {
		$this->name = $name;
		$this->db = new Db();
		$nameArray = array($name);

		try {
            $result = $this->db->getValues(Navigation::$query_getNavigation, $nameArray, Navigation::$query_navigationTypes);
            if(null == $result) {
            	print "no result";
            }

        } catch (Exception $e) {
            print "error in sql call";
        }

        $this->loadNavigationItems();

	}


	private function loadNavigationItems() {
		$nameArray = array($this->name);

		try {
			$result = $this->db->getValues(Navigation::$query_getNavigationItems, $nameArray, Navigation::$query_itemsTypes);
		
			for($i = 0; $i < count($result); $i++) {
				$row = $result[$i];
				$navigation_item = new NavigationItem($row['title'], $row['position'], $row['target'], $row['parent']);
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