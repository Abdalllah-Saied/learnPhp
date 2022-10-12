<?php
/*
var_dump($_POST);
echo '<br/>';
echo $_POST['name'];
echo '<br/>';
if (isset( $_POST['email']) && !empty($_POST['email'])){
    echo $_POST['email'];

}else{
    echo "pleas enter your mail";
}*/
//validation
$error_fields=array();
if (!(isset($_POST['name'])&& !empty($_POST['name']))){
    $error_fields[]="name";
}
if (!(isset($_POST['email'])&& !empty($_POST['email']))){
    $error_fields[]="email";
}
if (!(isset($_POST['password'])&& !empty($_POST['password']))){
    $error_fields[]="password";
}
if($error_fields){
    header("location: loginform.php?error_fields=" . implode(",",$error_fields));
    exit;
}

//connection to DB
$conn=mysqli_connect("localhost","root","","my_system");
if (! $conn){
    echo mysqli_connect_error();
    exit;
}
//Escape any special character to aviod SQL INJECTION
$name = mysqli_escape_string($conn,$_POST['name']);
$email = mysqli_escape_string($conn,$_POST['email']);
$password = mysqli_escape_string($conn,$_POST['password']);

//insert the data
$query ="INSERT INTO `users` (`name`, `email`, `password`) VALUES  ('".$name."','".$email."','".$password."')";
if (mysqli_query($conn,$query)){
    echo "Thank you!, your information has been saved ";
}else{
    echo $query;
    echo mysqli_error($conn);
}

//Close the connection
mysqli_close($conn);






