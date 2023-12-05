
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
    if(isset($_POST['mod_quantity']))
    {
       foreach($_SESSION['cart'] as $key => $value)
       {
        if($value['Item_name']==$_POST['Item_name'])
        {
          $_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];

          echo"<script>
          window.location.href='mycart.php';
          </script>";
        }
       }
    }
    if(isset($_POST["Remove_Item"]))
    {
      foreach($_SESSION['cart'] as $key => $value)
      {
       if($value['Item_name']==$_POST['Item_name'])
       {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
         echo"<script>
         window.location.href='mycart.php';
         </script>";
       }
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
                        <li> <a href="index.php">Home</a></li>
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
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $total=0;
    if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value){
      $sr=$key+1;
        echo"
        <tr>
            <td>$sr</td>
            <td>$value[Item_name]</td>
            <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
            <td>
            <form action='mycart.php' method='post'>
            <input type='number'class='iquantity' name='mod_quantity' onchange='this.form.submit()' value='$value[Quantity]' min='1' max='10'>
           <input type='hidden' name='Item_name' value='$value[Item_name]'>
            </form>
            </td>
            <td class='itotal '></td>
            <td>
            <form action='mycart.php' method='post'>
           <button name='Remove_Item' class='remove-button'>Remove</button>
           <input type='hidden' name='Item_name' value='$value[Item_name]'>
           </form>
           </td>
        </tr>
        ";
    }
}
    ?>
  </tbody>
</table>

<div class="total">
    <h3> Grand Total:</h3><br>
    <h4 id='gtotal'> </h4>
    <br>
    <?php   
    if(isset($_SESSION["cart"])&& count($_SESSION["cart"])> 0)
        {
    ?>
    <form class="buy" action="purchase.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="Name" required>

    <label for="email">Email:</label>
    <input type="email" name="Email" required>

    <label for="Phone number">Phone number:</label>
    <input type="text" name="Phone_number" required>

    <label for="address">Delivery Address:</label>
    <textarea name="address" rows="4" required></textarea>

    <button class="purchase"name="purchase" >Make Purchase</button>
    </form>
    <?php 
        }
     ?>
</div>
</div>
<script>
  var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  var gtotal=document.getElementById('gtotal');

  function subTotal()
  {
    gt=0;
    for(i=0; i<iprice.length;i++)
    {
      itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
      gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
  }
  subTotal();
</script>
</body>
</html>
