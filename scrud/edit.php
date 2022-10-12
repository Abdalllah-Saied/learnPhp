<?php
//check for errors
$error_fields = array();
//connection to DB
$conn = mysqli_connect("localhost", "root", "", "my_system");
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}

//select the user 
//edit.php?id=1 => $_GET['id']
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$select = "SELECT * FROM `users` WHERE `users`.`id`=" . $id . " LIMIT 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
echo $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!(isset($_POST['name']) && !empty($_POST['name']))) {
        $error_fields[] = "name";
    }
    if (!(isset($_POST['email']) && !empty($_POST['email']))) {
        $error_fields[] = "email";
    }
    if (!(isset($_POST['password']))) {
        $error_fields[] = "password";
    }
    if (!$error_fields) {
        //Escape any special character to aviod SQL INJECTION
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $name = mysqli_escape_string($conn, $_POST['name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = sha1($_POST['password']);
        $admin = (isset($_POST['admin'])) ? 1 : 0;
        //upload files 
        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/learnphp/uploads';
        //$avatar = '';
        if ($_FILES["avatar"]['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["avatar"]['tmp_name'];
            $avatar = basename($_FILES["avatar"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name.$avatar");
        } else {
            echo "File can't be uploaded";
            exit;
        }
        
        //update the data
        $query = "UPDATE `users` SET `name` = '" . $name . "', `email` = '" . $email . "', `admin` = " . $admin . ",`password` =
        '" . $password . "', `avatar` = '" . $name.".".$avatar . "'  WHERE `users`.`id`=" . $id;
        /**to make the photo name unique */
        if (mysqli_query($conn, $query)) {
            header("location:list.php");
        } else {
            echo $query;
            echo mysqli_error($conn);
        }
    }
}

//Close the connection
mysqli_free_result($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">

        <lab for="name">Name</lab>
        <input type="hidden" name="id" id="id" value="<?= (isset($row['id'])) ? $row['id'] : '' ?>">
        <input type="text" name="name" id="name" value="<?= (isset($row['name'])) ? $row['name'] : '' ?>">
        <?php if (in_array("name", $error_fields)) echo "* Please enter your name:" ?> <br>
        <lab for="email">email</lab>
        <input type="email" name="email" id="email" value="<?= (isset($row['email'])) ? $row['email'] : '' ?>">
        <?php if (in_array("email", $error_fields)) echo "* Please enter your email:" ?><br>
        <lab for="password">password</lab>
        <input type="password" name="password" id="password" value="">
        <?php if (in_array("password", $error_fields)) echo "* Please enter a password not less than 6 character:" ?><br>
        <label for="avatar">Avatar</label>
        <input type="file" id="avatar" name="avatar">
        <?php if ($row['avatar']) { ?>
            <img src="../uploads/<?= $row['avatar'] ?>" style="width :100px; height:100px">
        <?php } else { ?>
            <img src="../uploads/no_image.png" style="width :100px; height:100px">

        <?php } ?>
        <br>
        <lab for="admin">type</lab>
        <input type="checkbox" name="admin" <?= ($row['admin']) ? 'checked' : '' ?>>Admin
        <br><input type="submit" name="submit" value="Edit User">
    </form>


</body>

</html>