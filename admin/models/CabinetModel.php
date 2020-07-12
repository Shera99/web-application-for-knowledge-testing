<?php 

class CabinetModel extends Model{
    public function newTest($testArr){
        $sql = "INSERT INTO tests(name, date_start_test, date_end_test, count_question, count_time, count_point) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $testArr['name'], PDO::PARAM_STR);
        $stmt->bindValue(2, $testArr['start']);
        $stmt->bindValue(3, $testArr['end']);
        $stmt->bindValue(4, $testArr['countQues'], PDO::PARAM_INT);
        $stmt->bindValue(5, $testArr['time'], PDO::PARAM_INT);
        $stmt->bindValue(6, $testArr['countPoint'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>