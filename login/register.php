<?php
$full_name = $email = $password = $confirm_password = $contact_number = $address = '';
$full_name_err = $email_err = $password_err = $confirm_password_err = $contact_number_err = $address_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($_POST['full_name'])) {
        $full_name_err =  'Enter your full name';
    } else {
        $full_name = $_POST['full_name'];
    }

  
    if (empty($_POST['email'])) {
        $email_err = 'Enter an email address.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Please enter a valid email address.';
    } else {
        $email = $_POST['email'];
    }

   
    if (empty($_POST['password'])) {
        $password_err = 'Enter a password.';
    } elseif (strlen($_POST['password']) < 6) {
        $password_err = 'Password must be at least 6 characters long.';
    } else {
        $password = $_POST['password'];
    }

   
    if (empty($_POST['confirm_password'])) {
        $confirm_password_err = 'Confirm your password.';
    } elseif ($_POST['password'] != $_POST['confirm_password']) {
        $confirm_password_err = 'Passwords do not match.';
    } else {
        $confirm_password = $_POST['confirm_password'];
    }

    if (empty($_POST['contact_number'])) {
        $contact_number_err =  'Enter your contact number';
    } else {
        $contact_number = $_POST['contact_number'];
    }

    if (empty($_POST['address'])) {
        $address_err =  'Enter your address';
    } else {
        $address = $_POST['address'];
    }

    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($contact_number_err) && empty($address_err) ) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        require_once "config.php";
        $sql = "INSERT into reg_users(full_name, email, password, contact_number, address) VALUES(?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
    if($preparestmt){
        mysqli_stmt_bind_param($stmt,"sssss" ,$full_name, $email, $passwordhash, $contact_number, $address);
        mysqli_stmt_execute($stmt); 
        echo"<div>you are registered succesfully</div>";
    }
    else{
        echo "<div>something went wrong</div>";
    }
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
<body>
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
<form action="register.php" method="post">
    
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" class="control">
    <span  style="color: red;"><?php echo $full_name_err; ?></span>
    <br>
    <br>
    <label for="email">Email:</label>
    <input type="text" name="email" class="control">
    <span style="color: red;"><?php echo $email_err; ?></span>
    <br>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" class="control">
    <span style="color: red;"><?php echo $password_err; ?></span>
    <br>
    <br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" class="control">
    <span style="color: red;"><?php echo $confirm_password_err; ?></span>
    <br>
    <br>
    <label >Contact number</label>
    <input type="text" class="control" name="contact_number">
    <span style="color: red;"><?php echo $contact_number_err; ?></span>
    <br>
    <br>
    <label>Address</label>
    <input type="text" class="control" name="address">
    <span style="color: red;"><?php echo $address_err; ?></span>
    <br>
    <br>
  <div>
    <button type="submit" class="btnn" value="submit">Register</button>
  </div>
</form>
</div>
</div>
</body>
</html>
