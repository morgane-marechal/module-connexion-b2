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
    <title>Profil</title>
</head>

<body>
    <?php require('header.php');?>


    <h1>Votre profil</h1>

    <?php
        require('class/User.php');
        $object = new User();
        $id=$_SESSION["id"];
        $list=$object->getUserInfo($id);
    ?>

<?php 
    // --------------Traitement logique du formulaire-------------
    // check for elements


 if($_POST['update-login']){
    $updateLogin=$_POST['update-login'];
    echo $updateLogin;
    $newLogin = new User();
    $success = $newLogin->setLogin($id,$updateLogin);
    return $success;

}

if($_POST['firstname']){
    //echo "hello update login";
    $firstname=$_POST['firstname'];
    $newFirstname = new User();
    $success = $newFirstname->setFirstname($id,$firstname);
    return $success;
}

if($_POST['lastname']){
    //echo "hello update login";
    $lastname=$_POST['lastname'];
    $newLastname = new User();
    $success = $newLastname->setLastname($id,$lastname);
    return $success;
}

$password=$_POST['password'];
$checkPassword=$_POST['password-check'];
$pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";


//check pattern password
if (preg_match($pattern, $password)){
    $goodPatternPassword=true;

}

if($password===$checkPassword){
    $samePasswords=true;

}else{
    $message_same_password= "Les deux mot de passe sont différents";
    echo $message_same_password;
}

if(($goodPatternPassword===true)&&($samePasswords===true)){
    $newPassword = new User();
    $success = $newPassword->setPassword($id, $password);
    return $success;
    
    // $messageInfo="Vous avez changé votre mot de passe";
    // header("Location: profil.php");
}



?>

    <form id="form-login" action="profil.php" method="post" class="container-form">
        <div class="module-form">
            <label for="login">Changer de login : </label>
            <input type="text" name="update-login" id="login" placeholder="<?= $list[0]['login']; ?>" value="" />
        </div>
        <div class="module-form">
            <input type="submit" value="Valider nouveau login" />
        </div>
    </form>

    <form id="form-lastname" action="profil.php" method="post" class="container-form">
        <div class="module-form">
            <label for="lastname">Changer de nom : </label>
            <input type="text" name="lastname" id="lastname"  placeholder="<?= $list[0]['lastname']; ?>" value=""/>
        </div>
        <div class="module-form">
            <input type="submit" value="Valider nouveau nom" />
        </div>
    </form>

    <form id="form-firstname" action="profil.php" method="post" class="containerform">
        <div class="module-form">
            <label for="firstname">Changer de prénom : </label>
            <input type="text" name="firstname" id="firstname"  placeholder="<?= $list[0]['firstname']; ?>" value=""/>
        </div>
        <div class="module-form">
            <input type="submit" value="Valider nouveau prénom" />
        </div>
    </form>

    <form id="form-password" action="profil.php" method="post" class="container-form">
        <div class="module-form">
            <label for="password">Changer de Mot de passe: </label>
            <input type="password" name="password" id="password"  placeholder="****" value=""/>
            <p><small>Minimum de huit caractères, avec une majuscule, un chiffre et un caractère spécial</small></p>

        </div>
        <div class="module-form">
            <label for="password">Vérifier le nouveau mot de passe: </label>
            <input type="password" name="password-check" id="password-check" placeholder="****" value=""/>
        </div>
        <div class="module-form">
            <input type="submit" value="Valider le nouveau mot de passe" />
        </div>
    </form>

    <div class="message-info">
        <?= $messageInfo ?>
    </div>

<script defer src="scriptProfil.js"></script>


</body>
</html>