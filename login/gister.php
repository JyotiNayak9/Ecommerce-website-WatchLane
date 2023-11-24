<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $errors=array();

 if(empty($full_name) or empty($email) or empty($password) or empty($confirm_password) or empty($contact_number) or empty($address) ){
        array_push($errors,"All files are required");
} 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors,"Email is not valid");
}
if(strlen($password) < 6){
 array_push($errors,"Password must be at least 6 charactes long");
}
if($password != $confirm_password){
    array_push($errors,"Password doesnot match");
}
if(count($errors) > 0){
foreach($errors as $error){
    echo"$error";
}
}
else{

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" type="text/css" href="reg.css">
    <script src="https://kit.fontawesome.com/17ed295021.js" crossorigin="anonymous"></script>
</head> 
<div class="navbar">
                    <h2 class="logo"> WaTch LaNe</h2>               
                <div class="menu">
                    <ul>
                        <li> <a href="index.html">Home</a></li>
                        <li> <a href="about1.html">About Us</a></li>
                        <li> <a href="topproducts.html">Top Product</a></li>
                        <li> <a href="hotproduct.html">Hot Product</a></li>
                        <li> <a href=""><i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
                        <li> <a href=""><i class="fa-solid fa-user"></i></a></li>
                    </ul>
                </div>
</div>
<div class="register">
    <h2>Please Register Here:</h2>
    <hr>
<div class="form">
<form action="register.php" method="post"class="">
    <label>Full Name</label>
    <input type="text" class="control" name="full_Name">

    <label>Email</label>
    <input type="email" class="control" name="email">

    <label>Password</label>
    <input type="password" class="control" name="password">

     <label>Confirm Password</label>
    <input type="password" class="control" name="confirm_password">

    <label >Contact number</label>
    <input type="text" class="control" name="contact_number">

    <label>Address</label>
    <input type="text" class="control" name="address">

  <div>
    <button type="submit" class="btnn" value="submit">Sign in</button>
  </div>
</form>
</div>
</div>