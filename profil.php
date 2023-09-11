<?php



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
    <h1>Votre profil</h1>

    <form id="form-profil" action="" method="post" class="module-form">
        <div class="module-form">
            <label for="login">Changer de login : </label>
            <input type="text" name="login" id="login" required />
        </div>
        <div class="module-form">
            <label for="lastname">Changer de nom : </label>
            <input type="text" name="lastname" id="lastname" required />
        </div>
        <div class="module-form">
            <label for="firstname">Changer de prénom : </label>
            <input type="text" name="firstname" id="firstname" required />
        </div>
        <div class="module-form">
            <label for="password">Changer de Mot de passe: </label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="module-form">
            <label for="password">Vérifier le nouveau mot de passe: </label>
            <input type="password" name="password-check" id="password-check" required />
        </div>
        <div class="module-form">
            <input type="submit" value="Soumettre" />
        </div>
    </form>

</body>
</html>