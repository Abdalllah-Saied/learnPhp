<?php
//I will use it for storing the signed in user data
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connection to DB
    $conn = mysqli_connect("localhost", "root", "", "my_system");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }
    //Escape any special character to avoid SQL INJECTION
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);
    //sha1 collison https://secutity.googleblog.com
    //password_hash(Rpassword, PASSWORD_DEFAULT);
    //then check with password_verify()
    //the password column in db should be changed to char(60) if you decided to use password_verify

    // select
    $query = "SELECT * FROM `users` WHERE `email` ='".$email."' 
    and `password`='".$password."' LIMIT 1";
    $result=mysqli_query($conn,$query);
    if($row=mysqli_fetch_assoc($result)){
        $_SESSION['id']=$row['id'];
        $_SESSION['email']=$row['email'];
        header("LOCATION:../scrud/list.php");
        exit;
    }else{
        $error='Invalid email or password';
    }
    //close the connection 
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if (isset($error)) echo $error; ?>
    <form method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" id="password">

    </form>
</body>

</html>