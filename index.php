<?php
// 
/**
 * dfjjjj
 * dfjk
 * jdf
 * sdfkjlkjj
 * todo: print hello world
 */

var_dump((bool)'');
echo '<br/>';
var_dump((bool)'1');
echo '<br/>';
var_dump((bool)0);
echo '<br/>';
echo nl2br('ajdjj
dfjjd
jdfj
jjjf');
echo '<br/>';
$name = "abdallah";
echo <<< "Here"
    
    ///

Here;
echo '<br/>';
echo <<< 'now'
dkkkik2kk@#@##$#%$##$#$%#$#$%$%#?????//
now;
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<pre>';
print_r(
    [
        'abdalla' => 'bedo',
        0 => 'dod'

    ]
);
echo '</pre>';


$username='abdalla';
echo '$username';
echo "double quot $username";
echo '<br/>';
define("DB_NAME","ABDALLA");
echo '<br/>';
ECHO DB_NAME;
echo '<br/>';
echo php_uname();
echo '<br/>';

echo '<br/>';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    if($_POST['lang']=='ar'){
        header("location: ar.php");

    } else if($_POST['lang']=='en'){
        header("location: en.php");
    } else if($_POST['lang']=='fun'){
        header("location: functions.php");
    }
}
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username">
        <select name="lang" id="">
            <option value="ar">arabic</option>
            <option value="en">english</option>
            <option value="sp">spanish</option>
            <option value="fun">functions</option>
        </select>
        <input type="submit" value="go">
    </form>

</body>
</html>