<?php

include "db.class.php";


class Site {
    
    private static $query_getSite = "SELECT name, content, parent FROM sites WHERE id = ?";
    private static $query_paramTypes = "i";

    private $id;
    private $name;
    private $visibility;
    private $content;
    private $db;
    private $parent;


    public function __construct($id) {
        $this->id = $id;
        $this->db = new Db();
        $idArray = array($id);
        
        try {
            $result = $this->db->getValues(Site::$query_getSite, $idArray, Site::$query_paramTypes);
            if(sizeof($result) > 0) {
                $this->name = $result[0]["name"];
                $this->content = $result[0]["content"];
                $this->parent = $result[0]["parent"];
            }    
        } catch (Exception $e) {
            print "error in sql call";
        }
        
    }


    public function getId(){
        return $this->id;
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

    public function getParent(){
        return $this->parent;
    }
}
?>