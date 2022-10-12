<?php

//connection to DB
    $conn = mysqli_connect("localhost", "root", "", "my_system");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }
//select the user
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $quary="DELETE FROM `users` WHERE `users`.`id` =" . $id;
    
    if(mysqli_query($conn,$quary)){
        header("Location: list.php");
        exit;
    } else{
        echo $quary;
        echo mysqli_error($conn);
    }
//close the connection 
    mysqli_close($conn);
