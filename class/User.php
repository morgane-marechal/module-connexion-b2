<?php 

class User{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=127.0.0.1;dbname=moduleconnexionb2', 'root', '');

    }


    public function register($login, $prenom, $nom, $password){
        if (!$this->verifUser($login)) {
            /*
            try
            {
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=moduleconnexionb2', 'root', '');
            }
            catch (PDOException $e)
            {
                echo 'Echec de la connexion : ' . $e->getMessage();
            }*/

                $sql = "INSERT INTO user (login, firstname, lastname, password)
                        VALUES (:login, :prenom, :nom, :password)";
                $sql_exe = $this->db->prepare($sql);
                $sql_exe->execute([
                    'login' => htmlspecialchars($login),
                    'prenom' => htmlspecialchars($prenom),
                    'nom' => htmlspecialchars($nom),
                    'password' => $password
                ]);
                if ($sql_exe) {
                    return json_encode(['response' => 'ok', 'reussite' => 'Inscription réussie.']);
                } else {
                    return json_encode(['response' => 'not ok', 'echoue' => 'L\'inscription a échoué.']);
                }
            } else {
                return json_encode(['response' => 'not ok', 'echoue' => 'L\'utilisateur existe déjà']);
            }
        }

    public function getAll(){

        $displayUsers = $this->db->prepare("SELECT * FROM user");
        $displayUsers->execute([
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // public function hello(){
    //     return "hello new user ! How are you ?";
    // }



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

            $sql = "SELECT * 
                    FROM user
                    WHERE login = :login AND password = :password";
            $sql_exe = $this->db->prepare($sql);
            $sql_exe->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
            if ($results) {
                return $_SESSION["login"]=$login;
            } else {
                return false;
            }
    }




    }
    
 


    //------------------------------------------------------------------------------------

