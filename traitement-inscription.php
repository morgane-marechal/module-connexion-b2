<?php
require('class/User.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login=$_POST['login'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $goodPatternPassword=false;
        $samePasswords=false;
        $password=$_POST['password'];
        $checkPassword=$_POST['password-check'];
        $pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    

    //check pattern password
        if (preg_match($pattern, $password)){
            $goodPatternPassword=true;

        }else{
            $message_pattern = "mauvais format";
        echo json_encode(array("success" => $message_pattern));

        }

        if($password===$checkPassword){
            $samePasswords=true;

        }else{
            $message_same_password= "diff MP";
            echo json_encode(array("success" => $message_same_password));

        }

        if((isset($login))&&(isset($lastname))&&(isset($firstname))&&($goodPatternPassword===true)&&($samePasswords===true)){
            $register = new User();
           echo $register->register($login, $firstname, $lastname, $password);
            //json_encode($register);
            //header("Location: connexion.php");
        }
    }

?>