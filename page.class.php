<?php

require "site.class.php";
require "navigation.class.php";
require "template/sgi_template/index.php";

class Page {

	private $navi_left_top = "<img src='template/sgi_template/Bilder/navi.png' alt='Navigation' id='naviheader'/> <ul id='ul_navi_2'>";
	private $navi_left_botton = "</ul><img src='template/sgi_template/Bilder/navigation_bottom.png' alt=' ' />";	

	private $site;
	private $navi_top;
	private $navi_left;
	private $template;

	public function __construct($id){
		$this->template = new SgiTemplate();
		$this->site = new Site($id);
		$this->navi_top = new Navigation("topnavi", -1, "top");

		if($this->site->getParent() == -1){
			$this->navi_left = new Navigation("leftnavi", $this->site->getId(), "left");
		} else {
			$parentSite = new Site($this->site->getParent());
			if($parentSite->getParent() == -1){
				$this->navi_left = new Navigation("leftnavi", $this->site->getParent(), "left");		
			} else {	
				$this->navi_left = new Navigation("leftnavi", $parentSite->getParent(), "left");		
			}
		}
	}	


	public function __toString(){

		$content = array();
		$content["title"] = $this->site->getName();
		$content["navi_top"] = $this->navi_top->__toString();
		
		if(!$this->navi_left->isEmpty()){
			$content["navi_left"] = $this->navi_left_top . $this->navi_left->__toString() . $this->navi_left_botton;
		} else {
			$content["navi_left"] = "";
		}

		$content["textarea"] = $this->site->getContent();

		$this->template->setContent($content);
		
		return $this->template->__toString();		
	}


}
?>