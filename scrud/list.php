<?php
require '../models/User.php';

session_start();
if(isset($_SESSION['id'])){
    echo '<p> wlcome '. $_SESSION['email'].'<a href="../scrud/logout.php">Logout</a> </p>';
}else{
    header("LOCATION:../scrud/login.php");
    exit;
}
//using class user to do all operations
$user=new User();
$users=$user->getUsers();

/*
//open the connection
$conn = mysqli_connect("localhost", "root", "", "my_system");
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}
$query = "SELECT * FROM `users`";
*/
if(isset($_GET['search'])){
    $users=$user->serchUsers($_GET['search']);
    //$search = mysqli_escape_string($conn,$_GET['search']);
    //$query .=" WHERE `users`.`name` LIKE '%".$search."%' OR `users`.`email` LIKE '%".$search."%'";
}
//do the operations
//$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin :: List users</title>
</head>
<body>
    <h1>List users</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Enter {Name} or {Email} to serch">
        <input type="submit" value="search">
    </form>
    <!-- display a table containg all users -->
    <table>
        <thead>
            <tr>
                
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile pecture</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
<!-- start of while loop -->
<?php 
            foreach($users as $row){
?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?php if($row['avatar']){ ?>
                <img src="../uploads/<?= $row['avatar']?>" 
                style="width :100px; height:100px">
                <?php } else{ ?>
                <img src="../uploads/no_image.png" 
                style="width :100px; height:100px">
                
                <?php } ?>
            </td>
            <td><?= ($row['admin']) ? 'yes' : 'no' ?></td>
            <td><a href="edit.php?id=<?=$row['id']?>">Edit</a> | <a href="delete.php?id=<?=$row['id']?>">Delete</a></td>
        </tr>
<!-- end of while loop -->
<?php
            }
?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align: center"><?= count($users) ?> Users </td> </td>
            <td colspan="3" style="text-align: center"><a href="adduser.php">Add User</a> </td> </td>
        </tr>
    </tfoot>
    </table>
</body>
</html>
<?php

////close connection
//mysqli_free_result($result);
//mysqli_close($conn);
