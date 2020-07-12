<?php 
require_once "../models/login.php";

$model = new LoginModel();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'alltest':
            $result = $model->getAllTest();
            echo json_encode($result);
            break;
        case 'gotest':
            if (!empty($_POST['testid']) && !empty($_POST['fio'])) {
                $test = trim($_POST['testid']);
                $fio = trim($_POST['fio']);
                $result = $model->addUser($test, $fio);
                echo json_encode($result);
            } else {
                $result['error'] = true;
                $result['message'] = "Ошибка работы сервера!";
                echo json_encode($result);
            }
            break;
    }
}

?>