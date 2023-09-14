<?php
if(!isset($_SESSION))
{
    session_start();
}
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
    $newLogin = new User();
    $success = $newLogin->setLogin($id,$updateLogin);
    echo json_encode($success);
    //return $success;
    // die();
}

if($_POST['firstname']){
    //echo "hello update login";
    $firstname=$_POST['firstname'];
    $newFirstname = new User();
    $success = $newFirstname->setFirstname($id,$firstname);
    echo json_encode($success);

}

if($_POST['lastname']){
    //echo "hello update login";
    $lastname=$_POST['lastname'];
    $newLastname = new User();
    $success = $newLastname->setLastname($id,$lastname);
    echo json_encode($success);

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
    echo json_encode($success);

    
    // $messageInfo="Vous avez changé votre mot de passe";
    // header("Location: profil.php");
}
?>