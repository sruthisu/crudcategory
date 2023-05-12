
<?php
error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";
$db="category";
$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_category'])){

    $t_name=$_POST['name'];
    $t_category=$_POST['category'];
    $t_description=$_POST['description'];
    $t_price=$_POST['price'];
    
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="INSERT INTO album (name,category,description,price,image) VALUES('$t_name','$t_category','$t_description','$t_price','$dst_db')";
    $result=mysqli_query($data,$sql);


    if ($result){
header('location:albumlist.php');
    }

    else{
        echo" Not added album successfully";
    }
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <link rel="stylesheet"  href="css/style.css">

   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>
<?php
include 'adminsidebar.php'


?>
<center>

<h3 class="hthree">Add Category</h3>


   <div class="container">
<form action="#" method="POST" enctype="multipart/form-data">

  <div class="row">
    <div class="col-25">
      <label for="name"> Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" class="text"placeholder="Enter name..">
    </div>
  </div>


  <div class="row">
    <div class="col-25">
      <label for="name"> Category</label>
    </div>
    <div class="col-75">
      <input type="text" id="category" name="category" class="text" placeholder="Enter category..">
    </div>
  </div>
 
  
  
  
  
  <div class="row">
    <div class="col-25">
      <label for="name"> Price</label>
    </div>
    <div class="col-75">
      <input type="number" id="price" class="text" name="price" placeholder="Enter price..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
    <label for="Image">Image</label>
</div>
<div class="col-75">
    <input type="file" id="image" name="image" >
  </div>
</div>

<div class="row">
    <div class="col-25">
      <label for="description">Description</label>
    </div>
    <div class="col-75">
      <textarea id="description" name="description" class="text"placeholder="Enter description.."></textarea>
    </div>
  </div>
  <br>
<center>
  <div class="row">
    <div class="col-75">
    <input type="submit" value="Submit" name="add_category" class="btn btn-primary">
</div>
  </div>
</center>
</form>
   


</center>
</div>


</body>
</html>