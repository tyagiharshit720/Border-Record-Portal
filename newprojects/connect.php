<?php
 $username =$_POST['username']
 $mobilenumber =$_POST['mobilenumber']
 $password =$_POST['password']
 $conn = new mysqli('localhost','root','','registration');
 if($conn->connect_error){
     die('Connection Failed : '.$conn->connect_error);
 }
 else{
     $stmt=$conn->prepare("insert into regestration(username,mobilenumber,password)
     values(?,?,?)");
    
$stmt->bind_param("sis", $username, $mobilenumber, $password);
$stmt->execute();
echo "Resgestration Successfull";
$stmt->close();
$conn->close();
 }
?>