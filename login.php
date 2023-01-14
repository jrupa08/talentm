<?php
$email=$_POST['s'];
$password=$_POST['h'];

$con=mysqli_connect("localhost","root","","talent");
$result=mysqli_query($con,"select * from users where email='$email' && password='$password'");
$count=mysqli_num_rows($result);

if($count==1)
{
    //echo "Login Successfully";
    header("Location:fileupload.php");
}
else
{
    echo "Invalid Username Or Password";
}

?>