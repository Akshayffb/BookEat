<?php 

$data = $_POST;

if (empty($data['user']) ||
    empty($data['email']) ||
    empty($data['password']) ||
    empty($data['cpassword'])) {
    
    die('Please fill all required fields!');
}

if ($data['password'] !== $data['cpassword']) {
    echo"<script>alert('Password & Confirm Password do not match');</script>";
//    die('Password and Confirm password do not match!');   
}



session_start();
header('location: index.php');

$con = mysqli_connect('localhost','root',"");

mysqli_select_db($con, 'register');

$user = $_POST['user'];
$email = $_POST['email'];
$Phnumber = $_POST['Phnumber'];
$password = $_POST['password'];

$s = "SELECT * FROM userregister where email='$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['email'] = $email;

    // echo "Username/email already taken";
    
    echo "<script>alert('one or more input field is empty')
    window.location.href = 'userregisterpost.php'
    </script>";
    // echo "<script>alert('Incorrect Credentials');</script>";  
    // echo "<script>window.location= 'Login.html';</script>" ;
}else{
    $reg= " INSERT INTO `userregister`( `user`, `email`, `Phnumber`, `password`) VALUES ('$user','$email','$Phnumber','$password')";
    // echo"<script>alert('Registered Successfully');</script>";

    mysqli_query($con, $reg);
    // echo"<script>alert('Registered Successfully');</script>";
    echo "<script>
    window.history.go(-2)
    </script>
    ";
}



?>