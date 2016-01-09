class Site {
    
    private static $query_getSite = "SELECT content FROM sites WHERE name = ?";

    private $name;
    private $visibility;
    private $content;
    private $db;


    public function __construct($name){
        $this->db = new Db();
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
