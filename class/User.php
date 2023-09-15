<?php 

class User{

    private $db = 'NULL';

    public function __construct()
    {
        $db = new PDO('mysql:host=127.0.0.1;dbname=moduleconnexionb2', 'root', '');
        $this->db = $db;
    }


    public function register($login, $prenom, $nom, $password){
        if (!$this->verifUser($login)) {
                $sql = "INSERT INTO user (login, firstname, lastname, password)
                        VALUES (:login, :prenom, :nom, :password)";
                $sql_exe = $this->db->prepare($sql);
                $sql_exe->execute([
                    'login' => htmlspecialchars($login),
                    'prenom' => htmlspecialchars($prenom),
                    'nom' => htmlspecialchars($nom),
                    'password' =>password_hash($password, PASSWORD_DEFAULT)
                ]);
                if ($sql_exe) {
                    return json_encode(array("success" => true));
                    
                } else {
                    return json_encode(array("success" => false));

                }
            } else {
                return json_encode(array("success" => false));

            }
        }



    public function verifUser($login){
        $sql = "SELECT * 
                FROM user
                WHERE login = :login";
        $sql_exe = $this->db->prepare($sql);
        $sql_exe->execute([
            'login' => $login,
        ]);
        $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            return true;
        } else {
            return false;
        }
    }

    public function connexion($login, $password){
        $hashPassword=$this->getPassword($login);
        if (password_verify($password, $hashPassword)){
            $sql = "SELECT * 
                    FROM user
                    WHERE login = :login";
            $sql_exe = $this->db->prepare($sql);
            $sql_exe->execute([
                'login' => $login,
            ]);
            $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
            if ($results) {
                $getId=$this->getId($login);
                $_SESSION["id"]=$getId[0]["id"];
                $_SESSION["login"]=$login;
                //var_dump($_SESSION);
               //return json_encode(array("success" => true, "id" => $_SESSION["id"], "login" => $_SESSION["login"]));
            } else {
                return json_encode(array("success" => false));
            }
        }
    }

    public function getAll(){
        $displayUsers = $this->db->prepare("SELECT * FROM user");
        $displayUsers->execute([
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserInfo($id){
        $displayUser = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $displayUser->execute([
            'id' => $id,
        ]);
        $result = $displayUser->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getId($login){
        $displayUsers = $this->db->prepare("SELECT * FROM user WHERE login = :login");
        $displayUsers->execute([
            'login' => $login,
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPassword($login){
        $displayUsers = $this->db->prepare("SELECT password FROM user WHERE login = :login");
        $displayUsers->execute([
            'login' => $login,
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        //echo $result[0]['password'];
        return $result[0]['password'];
    }

    public function setLogin($id, $login){
        if (!$this->verifUser($login)) {
            $setLogin = $this->db->prepare("UPDATE user SET login = :login WHERE id = :id");

        $setLogin->execute([
            'id' => $id,
            'login' => $login,
        ]);
            if ($setLogin) {
                return json_encode(array("success" => true));
            }else{
                return json_encode(array("success" => false));
            }
        }else{
            return json_encode(array("success" => false));

        }
    }

    public function setFirstname($id, $firstname){
        $setFirstname = $this->db->prepare("UPDATE user SET firstname = :firstname WHERE id = :id");
        $setFirstname->execute([
            'id' => $id,
            'firstname' => $firstname,
        ]);
        if ($setFirstname) {
            return json_encode(array("success" => true));
        }else{
            return json_encode(array("success" => false));
        }
    }

    public function setLastname($id, $lastname){
        $setLastname = $this->db->prepare("UPDATE user SET lastname = :lastname WHERE id = :id");
        $setLastname->execute([
            'id' => $id,
            'lastname' => $lastname,
        ]);
        if ($setLastname) {
            return json_encode(array("success" => true));
        }else{
            return json_encode(array("success" => false));
        }
    }

    public function setPassword($id, $password){
        $setPassword = $this->db->prepare("UPDATE user SET password = :password WHERE id = :id");
        $setPassword->execute([
            'id' => $id,
            'password' => $password,
        ]);
        if ($setPassword) {
            return json_encode(array("success" => true));
        }else{
            return json_encode(array("success" => false));
        }
    }

}
    
 


    //------------------------------------------------------------------------------------

