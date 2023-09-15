<?php
    session_start();
?>
<?php

        require('class/User.php');
        $login=$_POST['login'];
        $password=$_POST['password'];

       if((isset($login))&&(isset($password))){
        $newLog = new User();
        $success = $newLog->connexion($login, $password);
        header("Location: profil.php");
        //echo json_encode($success);

        //var_dump($_SESSION);
        //if ($_SESSION['id']!=null){ 
        
        //};
    }
    ?>