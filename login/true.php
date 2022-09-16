<?php
$con=mysqli_connect("localhost","root","1234","dbtest");
$user=$_POST['user']
$password=$_POST['pass']
session_start();
$_SESSION['user']=$user;
$query="select * from Users where user='$user' and pass='$pass'";
$result=mysqli_query($con, $query);
$rows=mysqli_num_rows($result);

if($rows){
    header("location:newpage2.php");
}else{
    ?>
    <?php
    include("index.php")
    ?>
    <h1>Error</h1>
    <?php
}
msqli_free_result($result);
mysqli_close($con);