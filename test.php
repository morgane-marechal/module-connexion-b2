<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Accueil</title>
</head>

<body>
<?php


require('class/User.php');
$object = new User();
//var_dump($object);

//echo $object->register("HMagix", "Loulou", "Magic", "azerty13");

$MP = $object->getPassword('Harald');
//var_dump($MP);
echo "<br>";



?>
</body>
</html>