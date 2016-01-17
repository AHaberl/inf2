<?php

include "db.class.php";


class Site {
    
    private static $query_getSite = "SELECT content FROM sites WHERE name = ?";
    private static $query_paramTypes = "s";

    private $name;
    private $visibility;
    private $content;
    private $db;


    public function __construct($name){
        $this->name = $name;

        $this->db = new Db();

        $nameArray = array($name);
        try {
            $result = $this->db->getValues(Site::$query_getSite, $nameArray, Site::$query_paramTypes);
            $this->content = $result[0]["content"];
        } catch (Exception $e) {
            print "error in sql call";
        }
        
    }


    public function getName(){
        return $this->name;
    }


    public function getVisibility(){
        return $this->visibilty;
    }


    public function getContent(){
        return $this->content;
    }
}
?>