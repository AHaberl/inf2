<?php

require "db_exception.class.php";

class Db extends mysqli {

    private static $host = "localhost";
    private static $user = "root";
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

        for ($i=0; $i<count($parameters);$i++) {
            $types[] = $parameter_types;
            $type = 'bind' . $i;
            $$type = $parameters[$i];
            $types[] = &$$type;
        }


        call_user_func_array(array($stmt, 'bind_param'), $types);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            array_push($data, $row);
        }
        return $data;
    }

}
?>