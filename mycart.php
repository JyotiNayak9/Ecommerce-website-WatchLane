
<?php

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["cart"])) {
        if(isset($_SESSION["cart"]))
        {
           $myitems= array_column($_SESSION["cart"],"Item_name");
           if(in_array($_POST["Item_name"], $myitems)){
             echo'<script>
             alert("Item already added to cart");
             window.location.href="index.php";
             </script>';
           }
           else{
            $count = count($_SESSION["cart"]);
            $_SESSION['cart'][$count]=array('Item_name'=> $_POST['Item_name'],'Price'=> $_POST['Price'],'Quantity'=> 1) ;
            echo'<script>
            alert("Item added to cart");
            window.location.href="index.php";
            </script>';
           }
        }
        else{
            $_SESSION['cart'][0]=array('Item_name'=> $_POST['Item_name'],'Price'=> $_POST['Price'],'Quantity'=> 1) ;
            echo'<script>
            alert("Item added to cart");
            window.location.href="index.php";
            </script>';
    }

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="mycart.css">
</head>
<body>
<div class="navbar">
                    <h2 class="logo"> WaTch LaNe</h2>               
                <div class="menu">
                    <ul>
                        <li> <a href="index.html">Home</a></li>
                        <li> <a href="topproducts.html">Products</a></li>
                      
                    </ul>
                    <h2>MY CART</h2>
                </div>
</div>
<div class="carttable">
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Item Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $total=0;
    if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value){
       $total += $value['Price'];
        echo"
        <tr>
            <td>1</td>
            <td>$value[Item_name]</td>
            <td>$value[Price]</td>
            <td><input type='number' value='$value[Quantity]' min='1' max='10'></td>
            <td><button class='remove-button'>REMOVE</button></td>
        </tr>
        ";
    }
}
    ?>
  </tbody>
</table>

<div class="total">
    <h3>Total:</h3><br>
    <h4> <?php echo $total ?></h4>
    <br>
    <form>
    <button class="purchase">Make Purchase</button>
    </form>
</div>
</div>
</body>
</html>
