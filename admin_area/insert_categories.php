<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insert_categories.css">
    <script src="https://kit.fontawesome.com/17ed295021.js" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post">
    <div class="form" >
        <input type="text" class="form_cont" name="cat_title" placeholder="Insert category">
    </div>
    <div class="button">
    <input type="submit" name="insert_cat" value="Insert" class="btnn">
    </div>
</form> 
</body>
</html>
<?php
$con=mysqli_connect('localhost','root');
if(!$con){
    echo"connection error";
}
mysqli_select_db($con,'watchdata');
if(isset($_POST['insert_cat'])){
    $cat_title=$_POST['$cat_title'];
    $query="insert into 'categories'(cat_title)";
}
?>
