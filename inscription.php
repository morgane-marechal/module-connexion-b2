<?php
    session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="x-ua-compatible" content="IE=edge"/>
        <title>Inscription</title>
    </head>

    <body>
        <?php require('header.php');?>

        <h1>S'inscrire ici</h1>

        <form id="form-register" action="" method="post" class="module-form">
            <div class="module-form">
                <label for="login">Entrer le login : </label>
                <input type="text" name="login" id="login" required />
            </div>
            <div class="module-form">
                <label for="lastname">Entrer le nom : </label>
                <input type="text" name="lastname" id="lastname" required />
            </div>
            <div class="module-form">
                <label for="firstname">Entrer le prénom complet: </label>
                <input type="text" name="firstname" id="firstname" required />
            </div>
            <div class="module-form">
                <label for="password">Mot de passe: </label>
                <input type="password" name="password" id="password" required />
                <p><small>Le mot de passe doit être au minimum de huit caractères, avec une majuscule, un chiffre et un caractère spécial au minimum.</small></p>
            </div>
            <div class="module-form">
                <label for="password">Vérifier le mot de passe: </label>
                <input type="password" name="password-check" id="password-check" required />
            </div>
            <div class="module-form">
                <input type="submit" value="Soumettre" />
            </div>
        </form>


    <?php 
    // --------------Traitement logique du formulaire-------------
    // check for elements



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
            $message_pattern = "Le mot de passe doit être au minimum de huit
            caractères, avec une majuscule, un chiffre et un caractère spécial au minimum.";
            echo $message_pattern;
        }

        if($password===$checkPassword){
            $samePasswords=true;

        }else{
            $message_same_password= "Les deux mot de passe sont différents";
            echo $message_same_password;
        }

        if((isset($login))&&(isset($lastname))&&(isset($firstname))&&($goodPatternPassword===true)&&($samePasswords===true)){
            $register = new User();
            $register->register($login, $firstname, $lastname, $password);
            json_encode($register);
            //header("Location: connexion.php");
        }
    }





    ?>
    </body>
        <script defer src="scriptRegisterForm.js"></script>

</html>