<?php
$servername='localhost';
$username='root';
$dbpassword='';
$dbname='connect';
$email=$_POST['email'];
$password=$_POST['password'];
$tbname='datapull';

$conn = new mysqli($servername,$username,$dbpassword,$dbname);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

} else {
    
    $stmt = $conn->prepare("insert into $tbname(email,password)values(?,?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    header('location:loginpage.php');
     echo"connected succefully";
     $stmt->close();
     $conn->close();
}
    


?>