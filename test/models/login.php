<?php 
require_once "../config.php";

class LoginModel{

    private $conn = null;

    public function __construct(){
        $this->conn = ConnectBD::connect();
    }

    public function getAllTest(){
        date_default_timezone_set("Asia/Bishkek");
        $date = date("Y-m-d H:i:s");
        $result = [];
        $tests = [];
        $sql = "SELECT id,name FROM tests WHERE date_start_test < :date AND date_end_test > :date";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':date' => $date));
        $testall = $stmt->fetchAll();
        foreach ($testall as $row) {
           array_push($tests, $row);
        }
        $result['tests'] = $tests;
        return $result;
    }

    public function addUser($testid, $fio){
        $result = [];
        $result['error'] = false;

        $sql = "SELECT name,count_question,count_point,count_time FROM tests WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($testid));
        $test = $stmt->fetch();

        $sql = "SELECT id FROM check_users WHERE full_name = ? AND test_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($fio, $test['name']));

        if ($stmt->fetchColumn() < 1){
            $sql = "INSERT INTO check_users(full_name, test_name, test_count_question, test_point) VALUES(?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $add = $stmt->execute(array($fio, $test['name'], $test['count_question'], $test['count_point']));
            if ($add) {
                $_SESSION['userName'] = $fio;
                $_SESSION['testName'] = $test['name'];
                $_SESSION['countQues'] = $test['count_question'];
                $_SESSION['countPoint'] = $test['count_point'];
                $_SESSION['countTime'] = $test['count_time'];
                $result['error'] = false;
                $result['message'] = "Удачи в тестировании";
            } else {
                $result['error'] = true;
                $result['message'] = "Ошибка при входе!";
            }
        } else {
            $result['error'] = true;
            $result['message'] = "Вы уже сдали тест по данному предмету!";
        }
        return $result;
    }

}

?>