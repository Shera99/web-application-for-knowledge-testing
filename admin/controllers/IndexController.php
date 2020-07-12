<?php 

class IndexController extends Controller{
    protected $pageTpl = "login.tpl.php";

    public function __construct(){
        $this->model = new IndexModel();
        $this->view = new View();
    }

    public function index(){
        $this->pageData['title'] = "Авторизация";
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function auth(){
        $pattern = "/^[a-zA-Z0-9]{4,30}$/i";
        if (!empty($_POST['login']) && !empty($_POST['password']) && preg_match($pattern, $_POST['login']) && preg_match($pattern, $_POST['password'])) {
            $password = md5(trim($_POST['password']));
            $login = trim($_POST['login']);
            if ($this->model->auth($login, $password)) {
                $_SESSION['user'] = $login;
                echo json_encode(array('error' => false, 'message' => "Вы вошли в систему!!!"));
            } else {
                echo json_encode(array('error' => true, 'message' => "Ошибка! Не верный логин или пароль"));
            }
        } else {
            echo json_encode(array('error' => true, 'message' => "Ошибка! Введены не корректные данные"));
        }
    }
}

?>