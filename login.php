<?php

require 'connection.php';

$email=$_POST['email'];
$password=md5($_POST['password']);


$checkUser="SELECT id, username, email FROM user WHERE email='$email' and password='$password'";

$result=mysqli_query($con,$checkUser);

if(mysqli_num_rows($result)>0)
{
    while($row=$result->fetch_assoc())
    {

        $response['user']=$row;

    }
    $response['error']="000";
    $response['message']="Login Succesful";
}
else

{
    $response['error']="001";
    $response['message']="Login Failed";
}

echo json_encode($response);
?>