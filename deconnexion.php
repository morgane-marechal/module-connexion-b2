<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Déconnexion</title>
</head>

<body>
    <?php require('header.php');?>

    <h1>Vous êtes déconnectés</h1>
    <div id="forms-space"></div>
</body>
<script defer src="script.js"></script>
</html>