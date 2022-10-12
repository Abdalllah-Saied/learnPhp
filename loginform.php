
<?php
//check for errors
$errors_arr=array();
if(isset($_GET['error_fields'])){
    $errors_arr=explode(",",$_GET['error_fields']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<form action="process.php" method="post">

  <lab for="name">Name</lab>
  <input type="text" name="name" id="name"><?php if (in_array("name",$errors_arr))echo "* Please enter your name:"?> <br>
  <lab for="email">email</lab>
  <input type="email" name="email" id="email"><?php if (in_array("email",$errors_arr))echo "* Please enter your email:"?><br>
  <lab for="password">password</lab>
  <input type="password" name="password" id="password"><?php if (in_array("password",$errors_arr))echo "* Please enter a password not less than 6 character:"?><br>
  <lab for="gender">gender</lab>
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
  <input type="submit" name="submit" value="register">
</form>









</body>
</html>