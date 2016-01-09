<?php
class Db extends mysqli {

    private static $host = "localhost";
    private static $user = "";
    private static $password = "";
    private static $db = "inf2";


    public function __construct(){
	parent::__construct(self::$host, self::$user, self::$password, self::$db);
    }


    public function getValues($query, $parameters, $parameter_types){
        
        $stmt = $this->prepare($query);
        if($stmt === false){
            throw new DbException("Wrong sql " . $query . " error: " . $this->errno . " " . $this->error);
        }

        call_user_func_array(array($stmt, 'bind_param'), $parameters);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            array_push($data, $row);
        }
        return $data;
    }

    public function getSite($siteName, $visibility){
        $query_visibility_value = "SELECT order_value FROM visibilities WHERE name = ?";
        $stmt_visibility_value = $this -> prepare($query_visibility_value);
        $stmt_visibility_value -> execute();

        $res_visibility_value = $stmt_visibility_value -> get_result();
        $visibility_order_value = $res_visibility_value -> fetch_assoc();

        $query_site_visibility = "SELECT order_value FROM sites " 
                               . "INNER JOIN visibilities on sites.visibility = visibilities.name " 
                               . "WHERE name = ?";
        
	
    
    }


}
?>