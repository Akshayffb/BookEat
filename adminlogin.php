<?php 

session_start();

$con = mysqli_connect('localhost','root',"");

mysqli_select_db($con, 'adminlog');

// $user = $_POST['user'];
$email = $_POST['email'];
// $Phnumber = $_POST['Phnumber'];
$password = $_POST['password'];

$s = "SELECT * from adminregister where emailaddress='$email' && password='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);


if($num == 1){
    $_SESSION['emailaddress'] = $email;
    // $_SESSION
    // $_SESSION['userna'] = $email;
    // $b = "SELECT * FROM userregister WHERE user='$user'";

    // $_SESSION['detail']= $b;

    header('location: maindashboard.php');
}else{

    // $errMsg = "email/password is incorrect";  
    //          echo $errMsg;
    //          exit;

    echo "<script>alert('email/password is incorrect')
    window.location.href = 'adminlogin.html'
       </script>";
    
    // echo "<script>confirm('email/password is incorrect') window.location.href='http://someplace.com' </script>"; 
    // if(confirm("Do u want to continue?")) {
    //     window.location.href = "/some/url"
    // }

}

?>