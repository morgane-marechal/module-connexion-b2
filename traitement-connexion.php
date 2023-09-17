<?php
    session_start();
?>
<?php
    //var_dump($_SESSION);
        require('class/User.php');
        $login=$_POST['login'];
        $password=$_POST['password'];

       if((isset($login))&&(isset($password))){
        $newLog = new User();
        $success = $newLog->connexion($login, $password);
        echo json_encode($success);
    }
    ?>