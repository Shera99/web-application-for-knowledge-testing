<?php 

class CabinetController extends Controller{
    protected $pageTpl = "main.tpl.php";

    public function __construct(){
        $this->model = new CabinetModel();
        $this->view = new View();
    }

    public function index(){
        $this->checkAuth();

        $this->pageData['title'] = "Тесты";
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function getAllTests(){
        $this->checkAuth();
        $result = [];
        $vrem = [];
        $result['error'] = false;
        $result['testAll'] = $this->model->getAllFromTable('tests');
        for ($i = 0; $i < count($result['testAll']); $i++) {
            $date_start  = date_format(date_create($result['testAll'][$i]['date_start_test']), "d.m.Y H:i");
            $date_end = date_format(date_create($result['testAll'][$i]['date_end_test']), "d.m.Y H:i");
            $result['testAll'][$i]['date_start_test'] = $date_start;
            $result['testAll'][$i]['date_end_test'] = $date_end;
        }
        if (empty($result)) $result['error'] = true;
        echo json_encode($result);
    }

    public function setNewTest(){
        if ( !empty($_POST['testName']) && !empty($_POST['countQuesTest']) && !empty($_POST['countPointTest']) && !empty($_POST['timeTest']) && !empty($_POST['dateStartTest']) && !empty($_POST['dateEndTest'])) {
            $testArr = [];
            $testArr['name'] = (string) $_POST['testName'];
            $testArr['countQues'] = (int) $_POST['countQuesTest'];
            $testArr['countPoint'] = (int) $_POST['countPointTest'];
            $testArr['time'] = (int) $_POST['timeTest'];
            $testArr['start'] = $_POST['dateStartTest'];
            $testArr['end'] = $_POST['dateEndTest'];

            $this->model->newTest($testArr);
        } else {
            echo json_encode(array("error" => true, "message" => 'Введены не все данные!!!'));
        }
    }
}

?>