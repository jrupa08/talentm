<?php

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

if(!empty($name)||!empty($email)||!empty($mobile)||!empty($password))
{
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="talent";
    
    $con=new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error())
    {
        die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());  
    }
    else
    {
        $select="select email from users where email=? limit 1";
        $insert="insert into users(name,email,mobile,password) values (?,?,?,?)";
        
        //preparedstatement
        $stmt=$con->prepare($select);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        
        if($rnum==0)
        {
            $stmt->close();
            $stmt=$con->prepare($insert);
            $stmt->bind_param("ssss",$name,$email,$mobile,$password);
            $stmt->execute();
            echo "Record Inserted Successfully";
        }
        else
        {
            echo "This email already exist";
        }
        $stmt->close();
        $con->close();
    }
}
else
{ 
 echo "All Fields are Required";
    die();
}



?>