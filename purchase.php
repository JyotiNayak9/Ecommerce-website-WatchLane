<?php
session_start();

$conn=mysqli_connect("localhost","root","","watch_order");
if(mysqli_connect_error()){
    echo "<script>
    alert('Connection Error');
    windows.location.href='mycart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["purchase"])) 
    {
       $query1= "INSERT INTO order_manager (Name, Email, Phone_no, address) VALUES ('$_POST[Name]','$_POST[Email]','$_POST[Phone_number]','$_POST[address]')";
    if(mysqli_query($conn,$query1)){
        $Order_id=mysqli_insert_id($conn);
       $query2= "INSERT INTO user_orders(`Order_id`, `Item_name`, `Price`, `quantity`) VALUES (?,?,?,?)";
        $stmt=mysqli_prepare($conn,$query2);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"init", $Order_id,$Item_nmae,$Price,$quantity);
        }
    }
    else{
        echo "<script>
        alert('sql Error');
        windows.location.href='mycart.php';
        </script>";
    }
}
}
?>