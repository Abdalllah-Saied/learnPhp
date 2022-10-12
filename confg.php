<?php
    $dsn= 'mysql:host=localhost;dbname=products'; //data source name
    $user='root';//the user to connect
    $pass='';//password
    $options=array(
        PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
    );

try {
    $db=new PDO($dsn,$user,$pass,$options); //start a new connection with PDO calss
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q="INSERT INTO item (name) VALUES ('العبد')";
    $db->exec($q);
    echo 'you are connected';

}catch (PDOException $e){
    echo 'Failed ' . $e->getMessage();

}
