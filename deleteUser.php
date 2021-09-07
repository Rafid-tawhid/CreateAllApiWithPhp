<?php

require 'connection.php';
$id=$_POST['id'];
$deleteUser=mysqli_query($con,"DELETE FROM user WHERE id='$id'");
if($deleteUser>0)
{
    $response['error']=200;
    $response['message']="Account is Deleted";
}

else
{
    $response['error']=100;
    $response['message']="Not deleted";
}

echo json_encode($response);
?>