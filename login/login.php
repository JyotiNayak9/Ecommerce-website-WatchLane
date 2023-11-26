<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
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
<div class="container">
    <h2>Login</h2>
    <form action="" method="post" class="form">
        <label for="email">Email:</label>
        <input type="text" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $email = 'email';
        $password = 'password';
        require_once 'config.php';
        $sql = "SELECT *FROM reg_users WHERE email='$email'";
        $result = mysqli_query( $conn, $sql);
        $reg_users = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        if ( $reg_users){
            if(password_verify($password, $reg_users["password"])){
                header("location: welcome.php");
                die();
        }else{
            echo '<p style="color: green;">Password doesnot match.</p>';
        }
    }
            else{
                echo '<p style="color: green;">Email doesnot match.</p>';
        }
    }
    ?>
</div>

</body>
</html>
