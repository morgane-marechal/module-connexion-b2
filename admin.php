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
    <title>Admin</title>
</head>

<body>
<?php require('header.php');?>

<?php
    require('class/User.php');
    $object = new User();
    $list=$object->getAll();
    $sizeList=count($list);


    for ($i = 0; $i < $sizeList; $i++) {
        echo $list[$i]["id"]." ".$list[$i]["login"]." ".$list[$i]["firstname"]." ".$list[$i]["lastname"]."<br>";
    }
?>
</body>
</html>