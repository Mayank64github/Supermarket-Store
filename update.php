<html>
<style>
</style>
<link rel="stylesheet" href="w3.css">
<div class='w3-margin'>
<?php
$user='root';
$pass='';
$db='SUPERMARKET';
$db=mysqli_connect('localhost',$user,$pass,$db);

if(isset($_GET['edit']))
{
  $pr=$_GET['edit'];
  echo("<form action='update.php?pr=".$pr."' method='POST'>");
  echo("Enter the new price :<br>");
  echo("<input type='number' name='edit' placeholder='price'></input><br><br>");
  echo("<input type='submit'></input>");
  echo("</form>");
}

else
{
if(isset($_GET['del']))
{
  $del=$_GET['del'];
  $q=mysqli_query($db,"DELETE FROM products WHERE product_id=".$del);
  if($q)
  echo('item deleted');
  echo("<a href='update.php'><button class='w3-btn'>OK</button></a>");
}
if(isset($_POST['edit']))
{
  $id=$_GET['pr'];
  $edit=$_POST['edit'];
  $sql=mysqli_query($db,"UPDATE products SET product_price=".$edit." WHERE product_id=".$id);
}
$q=mysqli_query($db,"SELECT * FROM products");

echo("<table class='w3-table w3-twothird w3-display-topmiddle w3-margin w3-card-2 w3-bordered'>
  <tr>
    <th>Item_ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Category</th>
    <th>Edit Price</th>
    <th>Remove</th>
  </tr>");
  while($row=mysqli_fetch_assoc($q))
  {
     $cat=$row['product_cat'];
     $edit=$row['product_id'];
     $q1=mysqli_query($db,"SELECT cat_title FROM categories WHERE cat_id=".$cat);
     $r=mysqli_fetch_assoc($q1);
     echo("<tr>");
     echo("<td>".$row['product_id']."</td>");
     echo("<td>".$row['product_title']."</td>");
     echo("<td>".$r['cat_title']."</td>");
     echo("<td>".$row['product_price']."</td>");
     echo("<td>".$row['product_image']."</td>");
     echo("<td><a href='update.php?edit=".$edit."'><button class='w3-btn'>Edit</button></a></td>");
     echo("<td><a href='update.php?del=".$edit."'><button class='w3-btn'>Delete</button></a></td>"); 
     echo("<tr>");
  }

}
?>
</div>
</div>
</html>
