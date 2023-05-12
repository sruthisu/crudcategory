<?php
error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";
$db="category";
$data=mysqli_connect($host,$user,$password,$db);

if ($_GET['album_id'])
{
$t_id=$_GET['album_id'];
$sql="SELECT * from album WHERE id='$t_id'";
$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();
}

if(isset($_POST['add_category'])){

    $t_name=$_POST['name'];
    $t_category=$_POST['category'];
    $t_price=$_POST['price'];
    $t_description=$_POST['description'];
    
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    
    

    $result2=mysqli_query($data,$sql2);

    if($result2){
        header ("location:albumlist.php");
    
    }
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>

    <link rel="stylesheet"  href="css/style.css">

   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>

<center>
  <br>
  <br>

<h1>Album Details</h1>
<br>

   <div class="container">
<form action="#" method="POST" enctype="multipart/form-data">

  <div class="row">
    <div class="col-25">
      <label for="name"> Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" class="text" value="<?php echo " {$info['name']}" ;?>" >
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="category"> Category</label>
    </div>
    <div class="col-75">
      <input type="text" id="category"class="text" name="category" value="<?php echo " {$info['category']}" ;?>" >
    </div>
  </div>
 
  <div class="row">
    <div class="col-25">
      <label for="price"> Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="price"  class="text" name="price" value="<?php echo " {$info['price']}" ;?>" >
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="description">Description</label>
    </div>
    <div class="col-75">
      <input  name="description" class="text" value="<?php echo " {$info['description']}" ;?>" ></input>
    </div>
  </div>
  <br>
  
  
  <div class="row">
    <div class="col-25">
    <label for="image"> Image</label>
    
</div>
<div class="col-75">
<img width="150px" height="150px" src="<?php echo " {$info['image']}" ;  ?> "></img>
  
  </div>
</div>
<?php echo "<a class='btn btn-primary' href='updatealbum.php?album_id={$info['id']}'>Update</a>"; ?>
<?php echo " <a onClick=\"javascript:return confirm ('Are you sure to delete this?') \" href='albumlist.php?album_id={$info['id']}' class='btn btn-danger'>Delete </a>";



?>

</form>
   


</center>
</div>


</body>
</html>