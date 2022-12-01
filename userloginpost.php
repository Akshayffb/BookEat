<?php 

session_start();
// $_SESSION['url'] = $_SERVER['REQUEST_URI']; 


$con = mysqli_connect('localhost','root',"");

mysqli_select_db($con, 'register');

// $user = $_POST['user'];
$email = $_POST['email'];
// $Phnumber = $_POST['Phnumber'];
$password = $_POST['password'];

// $HTTP_REFERER = $_POST['HTTP_REFERER'];

$s = "SELECT * from userregister where email='$email' && password='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);






if($num == 1){
    $_SESSION['email'] = $email;
    // $_SESSION
    // $_SESSION['userna'] = $email;
    // $b = "SELECT * FROM userregister WHERE user='$user'";

    // $_SESSION['detail']= $b;

    // header('Location: $_SERVER[HTTP_REFERER']);

    // header("Location: ".$_SESSION['current_page'].");   




    // $message = urlencode("After clicking the button, the form will submit to home.php. When, the page home.php loads, the previous page index.php is redirected. ");
    // header("Location:".$_SERVER[HTTP_REFERER]."?message=".$message);
    // die;

    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    // header("location: history.back()");
    // if(isset($_SESSION['url'])) 
    // {
    // $url = $_SESSION['url']; // holds url for last page visited.
    // header("Location: ".$url); 
    // }


    echo "<script>
    window.history.go(-2)
    </script>
    ";


}else{

    // $errMsg = "email/password is incorrect";  
    //          echo $errMsg;
    //          exit;


    echo "<script>alert('Email or Password is incorrect')
    window.location.href = 'userlogin.php'
       </script>";
    
    // echo "<script>confirm('email/password is incorrect') window.location.href='http://someplace.com' </script>"; 
    // if(confirm("Do u want to continue?")) {
    //     window.location.href = "/some/url"
    // }

}

?>