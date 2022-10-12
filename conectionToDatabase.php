<?php

//open the connection
$conn =mysqli_connect("localhost","root","","my_system");
if (!$conn){
    echo mysqli_connect_error();
    exit;
}
//do the operations
$query ="SELECT * FROM `users`";
$result=mysqli_query($conn,$query);
while ($row=mysqli_fetch_assoc($result)){
    echo "id: ".$row['id']. "<br>";
    echo "name: ".$row['name']."<br>";
    echo "name: ".$row['email']."<br>";
    echo str_repeat("-",50)."<br>";
}
//close the connection
mysqli_free_result($result);
mysqli_close($conn);