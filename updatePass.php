<?php

require 'connection.php';
$current=md5($_POST['current']);
$new=md5($_POST['new']);
$email=$_POST['email'];
$checkuser="SELECT * FROM user WHERE email='$email' and password='$current'";
$result=mysqli_query($con,$checkuser);

if(mysqli_num_rows($result)>0)
{

    $updatePass=mysqli_query($con,"UPDATE user SET password='$new' WHERE email='$email'");

    if($updatePass>0)
    {
        $response['error']="200"; 
        $response['message']="Pass Update Success"; 
    }
    else
    {
        $response['error']="400"; 
        $response['message']="Pass not Updated"; 
    }

}
else
{
    $response['error']="100"; 
    $response['message']="User doesnt exist"; 
}


echo json_encode($response);
?>