
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
    <meta name="viewport" content="width==device-width, initial-scale=1.0">
    <title>Admin Home</title>
    
    
    <link rel="stylesheet"  href="css/style.css">

   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    
    <?php
include 'adminsidebar.php'


?>

<div class="content">
<center>
<h2>All Categories List</h2>
<table border="1px">
    <thead>



    <tr>
        <th style="padding:20px;font-size:15px;"> Name</th>
        <th style="padding:20px;font-size:15px;">Description</th>
        <th style="padding:20px;font-size:15px;">Image</th>
        <th style="padding:20px;font-size:15px;">Delete</th>
        <th style="padding:20px;font-size:15px;">Update</th>
        <th style="padding:20px;font-size:15px;">Details</th>
        

</tr>

</thead>
<?php
while($info=$result->fetch_assoc())
{

    ?>

<tbody>
<tr>


<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['name']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "{$info['description']}"; ?> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"><img height="100px" width="100px" src="<?php echo "{$info['image']}"; ?>""> </td>
<td style="padding:20px;font-size:15px;background-color:skyblue;"> 
<?php echo " <a onClick=\"javascript:return confirm ('Are you sure to delete this?') \" href='albumlist.php?album_id={$info['id']}' class='btn btn-danger'>Delete </a>";




?>

</td>

<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "<a class='btn btn-primary' href='updatealbum.php?album_id={$info['id']}'>Update</a>"; ?> </td>

<td style="padding:20px;font-size:15px;background-color:skyblue;"><?php echo "<a class='btn btn-info' href='eachcategory.php?album_id={$info['id']}'>View</a>"; ?> </td>
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