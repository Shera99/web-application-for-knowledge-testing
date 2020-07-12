<?php 

class IndexModel extends Model{
    public function auth($login, $password){
        $sql = "SELECT id FROM admin WHERE login = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $login, PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch();
        if (!empty($res)) return true;
        else return false;
    }
}

?>