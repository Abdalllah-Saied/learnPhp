<?php


include 'C:\xampp\htdocs\learnPhp\models\User.php';
$user=new User();
$usersarray=['`name`'=>'abdallah','`email`'=>'abdallah@dfd','`password`'=>'456789'];
echo 'before';
$user->addUser($usersarray);
    echo 'after';


?>