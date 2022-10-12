<?php
//check for errors
$error_fields = array();
if (!(isset($_POST['name']) && !empty($_POST['name']))) {
    $error_fields[] = "name";
}
if (!(isset($_POST['email']) && !empty($_POST['email']))) {
    $error_fields[] = "email";
}
if (!(isset($_POST['password']) && strlen($_POST['password']) > 5)) {
    $error_fields[] = "password";
}
if (!$error_fields) {
    //connection to DB
    $conn = mysqli_connect("localhost", "root", "", "my_system");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }
    //Escape any special character to avoid SQL INJECTION
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);
    $admin = (isset($_POST['admin'])) ? 1 : 0;
    //upload files 
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/learnphp/uploads';
    $avatar = '';
    if ($_FILES["avatar"]['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["avatar"]['tmp_name'];
        $avatar = basename($_FILES["avatar"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name.$avatar");
    } else {
        echo "File can't be uploaded";
        exit;
    }

    //insert the data
    $query = "INSERT INTO `users` (`name`, `email`, `admin`,`password`,`avatar`) VALUES  ('" . $name . "','" . $email . "','" . $admin . "','" . $password . "','" . $name.".".$avatar . "')";
    if (mysqli_query($conn, $query)) {
        header("location:list.php");
    } else {
        echo $query;
        echo mysqli_error($conn);
    }
    //Close the connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <form method="Post" enctype="multipart/form-data">

        <lab for="name">Name</lab>
        <input type="text" name="name" id="name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>">
        <?php if (in_array("name", $error_fields)) echo "* Please enter your name:" ?> <br>
        <lab for="email">email</lab>
        <input type="email" name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
        <?php if (in_array("email", $error_fields)) echo "* Please enter your email:" ?><br>
        <lab for="password">password</lab>
        <input type="password" name="password" id="password" value="">
        <?php if (in_array("password", $error_fields)) echo "* Please enter a password not less than 6 character:" ?><br>
        <lab for="admin">type</lab>
        <input type="checkbox" name="admin" <?= (isset($_POST['admin'])) ? 'checked' : '' ?>>Admin
        <br>
        <label for="avatar">Avatar</label>
        <input type="file" id="avatar" name="avatar">
        <br><input type="submit" name="submit" value="register">
    </form>

</body>

</html>