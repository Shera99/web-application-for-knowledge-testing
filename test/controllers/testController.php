<?php 
if ( !empty($_POST['test']) ) {
    include "../models/testModel.php";
    $testId = (int) $_POST['test'];
    $result = getCorrectAnswers($testId);
    $time = $_POST['testTime'];
    unset($_POST['test']);
    unset($_POST['testTime']);
    $result_data = getTestDataResult($_POST, $result, $time);

    echo json_encode($result_data);
    die;
} else {
    include "./models/testModel.php";
}

function getTestDataResult($userRes, $dbResult, $times){
    $count_question = (int) $_SESSION['countQues'];
    $coint_point = (int) $_SESSION['countPoint'];

    $coint_point_for_answer = $coint_point / $count_question;
    $count_correct_answer = 0;
    $result = [];
    
    foreach ($userRes as $q => $a) {
        if ( $a != 'undefined') {
            $key = array_search($a, $dbResult);
            if ($key == $q) {
                $count_correct_answer++;
            }
        }
    }

    $count_point_result = $count_correct_answer * $coint_point_for_answer;
    $count_point_result = (double) $count_point_result;
    $result['Result'] = $count_correct_answer;
    $result['count_point'] = $count_point_result;
    $models = null;
    $models = new TestModel();
    $set = $models->setResultTest($count_correct_answer, $count_point_result, $times);
    if ($set) { 
        $result['error'] = false;
        $_SESSION['test_in'] = true;
    }
    else {
        $result['error'] = false;
        $result['Message'] = 'Не поладки с сервером';
        $_SESSION['test_in'] = false;
    }
    return $result;
}

function getCorrectAnswers($testId){
    $model = null;
    if (!$testId) return false;
    $model = new TestModel();
    $data = $model->getCorrectAnswersByTestId($testId);
    return $data;
}

function getAllTestData($testid){
    $error = [];
    $model = new TestModel();
    $result = $model->getTests($testid);
    if ($result != "") {
        return $result;
    } else {
        $error['error'] = true;
        $error['message'] = "Такого теста не существует!!!";
        return $error;
    }
}

function pagination($count_question, $data){
    $keys = array_keys($data);
    $pagination = '<div class="center">';
    $pagination .= '<div class="pagination">';
    $pagination .= '<a id="quesPrev">&laquo;</a>';
    for ($i = 1; $i <= $count_question; $i++) {
        $key = array_shift($keys);
        if ($i == 1) {
            $pagination .= '<a class="active" id="' . $i . '" href="#question-' . $key . '">' . $i . '</a>';
        } else {
            $pagination .= '<a href="#question-' . $key . '" id="' . $i . '">' . $i . '</a>';
        }
    }
    $pagination .= '<a id="quesNext" class="' . $i . '">&raquo;</a>';
    $pagination .= '</div>';
    $pagination .= '</div>';
    return $pagination;
}

?>