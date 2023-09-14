<?php
    session_start();
?>

<!DOCTYPE html>

<head>
<meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" />
            <meta http-equiv="x-ua-compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
            <title>Home</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
<script defer src="scriptDesign.js"></script>

</html>