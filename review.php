<?php
$con=mysqli_connect('localhost','root');
if($con){
    echo"connection succesfull";
}else{
    echo"No connection";
}
mysqli_select_db($con,'watchdata');
$username=$_POST['username'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$query="insert into review (username, email, comment) 
values('$username','$email','$comment')";
mysqli_query($con,$query);
?>