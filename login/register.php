<?php
require_once(config.php);

$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err="";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //check if username is sempty
    if(empty(trim($_POST("username")))){
        $username_err="Username cannot be blank";

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
    <h2>Please Register Here :</h2>
    <hr>
<div class="form">
<form action="" method="post"class="">
    <label>Full Name</label>
    <input type="text" class="control" name="Full_Name">

    <label>Email</label>
    <input type="email" class="control" name="Email">

    <label>Password</label>
    <input type="password" class="control" name="password">

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