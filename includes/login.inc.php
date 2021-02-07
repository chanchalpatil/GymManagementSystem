<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){

 //Define $user and $pass
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "");
 //Selecting Database
 $db = mysqli_select_db($conn, "gym_database");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM user WHERE uname='$user' AND upassword='$pass'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location: ../home.php");  // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 mysqli_close($conn); // Closing connection

}
 
?>





































<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once 'dbh.inc.php'
?>

<?php 

if(isset($_POST['submit']))

{

$uname = $_POST['uname'];
$upassword = $_POST['upassword'];
$sql = "SELECT * FROM User where uname='nidhi' and upassword='1234';";
$query = mysqli_query($conn, $sql) or die( mysqli_error($conn));

if($query)

{

header("Location: home.php");
exit();

}

else
{
header("Location: index.php");
}

}

?>