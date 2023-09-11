<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Admin</title>
</head>

<body>
<?php


require('class/User.php');
$object = new User();
$list=$object->getAll();
var_dump($list);




?>
</body>
</html>