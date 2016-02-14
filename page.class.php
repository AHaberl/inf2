<?php

require "site.class.php";
require "navigation.class.php";


class Page {
	
	private $site;
	private $navi_top;
	private $navi_left;
	private $template;

	public function __construct($id){
		$this->site = new Site($id);
		$this->navi_top = new Navigation("topnavi", -1);
	}	


}
?>