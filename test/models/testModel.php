<?php 
if ( !empty($_POST['test']) ) require_once "../config.php";
else require_once "./config.php";

class TestModel{
    private $conn = null;

    public function __construct(){
        $this->conn = ConnectBD::connect();
    }

    public function getCorrectAnswersByTestId($testId){
        $sql = "SELECT q.id AS question_id, a.id AS answer_id 
                FROM questions q 
                LEFT JOIN answers a ON q.id = a.id_question
                WHERE q.test_id = $testId AND a.true_answer = '1'";
        $data = [];
        foreach ($this->conn->query($sql) as $row) {
            $data[$row['question_id']] = $row['answer_id'];
        }
        return $data;
    }

    public function setResultTest($answer, $point, $times){
        date_default_timezone_set("Asia/Bishkek");
        $date = date("Y-m-d H:i:s");
        $fullName = trim($_SESSION['userName']);
        $sql = "SELECT id FROM check_users WHERE full_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $fullName);
        $stmt->execute();
        $id = $stmt->fetch();

        $sql = "UPDATE check_users SET test_end_time = :t, test_true_question_count = :c, test_true_point = :p, test_date = :d WHERE id = :i";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':t', $times, PDO::PARAM_STR);
        $stmt->bindValue(':c', $answer, PDO::PARAM_INT);
        $stmt->bindValue(':p', $point);
        $stmt->bindValue(':i', $id['id'], PDO::PARAM_INT);
        $stmt->bindParam(':d', $date);
        $upd = $stmt->execute();

        if ($upd) return true;
        else return false;
    }

    public function getTests($test){
        $iter = 0;
        $result = [];
        $countQuestion = (int) $_SESSION['countQues'];
        $sql = "SELECT id 
                FROM questions
                WHERE test_id = $test 
                ORDER BY RAND()
                LIMIT $countQuestion";
        foreach ($this->conn->query($sql) as $row1){
            $iter++;
            $id = $row1['id'];
            $sql = "SELECT q.question, a.id, a.answer, a.id_question 
                FROM questions q 
                LEFT JOIN answers a ON q.id = a.id_question
                WHERE q.id = $id
                ";
            foreach ($this->conn->query($sql) as $row) {
                $result[$row['id_question']][0] = $row['question'];
                $result[$row['id_question']][$iter][$row['id']] = $row['answer'];
            }
        }
        return $result;
    }
}

?>