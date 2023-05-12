<?php
session_start();
error_reporting(0);

$host="localhost";
$user="root";
$password="";
$db="category";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from album";
$result=mysqli_query($data,$sql);


if ($_GET['album_id'])
{
    $t_id=$_GET['album_id'];

    $sql2="DELETE FROM album WHERE id='$t_id'";
    $result2= mysqli_query($data,$sql2);

    if ($result2){
       header('location:albumlist.php');
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body background="images/backgroundimage.jpg" class="imagebackground">
<nav>
       
        <ul>
            <li> <a href="index.php" >Home</a></li>
           
            <li> <a href="categorylist.php" >Categories</a></li>
            <li> <a href="login.php" class="btn btn-success" >Login</a></li>
</ul>
</nav>

<div class="tableone">
<center>
<h2>All Categories List</h2><br>
<table border="1px">
    <thead>



    <tr>
    <th style="padding:20px;font-size:15px;"> Id</th>
        <th style="padding:20px;font-size:15px;"> Name</th>
        <th style="padding:20px;font-size:15px;"> Category</th>
        <th style="padding:20px;font-size:15px;">Price</th>
        <th style="padding:20px;font-size:15px;">Description</th>
        <th style="padding:20px;font-size:15px;">Details</th>
        
        
        

</tr>

</thead>
<?php
while($info=$result->fetch_assoc())
{

    ?>

<tbody>
<tr>


<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['id']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['name']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['category']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['price']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['description']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "<a class='btn btn-primary' href='viewalbum.php?album_id={$info['id']}'>View</a>"; ?> </td>
</tr>

</tr>
</tr>
</tbody>

<?php
}

?>
</table>

</center>

</div>
    
</body>
</html>