<?php

class Model{
    protected $conn = null;

    public function __construct(){
        $this->conn = ConnectDB::connectToDb();
    }

    public function getAllFromTable($table){
        $result = [];
        $sql = "SELECT * FROM $table";
        
        foreach ($this->conn->query($sql) as $row) {
            array_push($result, $row);
        }

        return $result;
    }   
}

?>