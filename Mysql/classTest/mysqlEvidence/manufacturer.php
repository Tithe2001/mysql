<?php
include_once "db_config.php";

if (isset($_POST['btn_submit'])){
    // $id=$_POST['id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];

$db->query("call add_manufacturers (null, '{$name}','{$address}','{$contact}')  ");

}





if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->query("delete from manufacturers where id= $id" );
}


// store procedure
// BEGIN
// insert into manufacturers (id,name,address,contact) values(null,name,address,contact);
// END




// DELIMITER $$
// create TRIGGER after_delete
// after delete 
// on manufacturers
// for each ROW
// BEGIN
// delete from products2 where manufacturer_id=old.id;

// END $$
// DELIMITER ;





// CREATE view view_products as
// SELECT * from products2 where amount>1000;





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer Information</title>

    <style>
        body{
            display:flex;
            gap: 25px;
        }
    </style>
</head>
<body>
  <div>
<h2> Add Manufacturer</h2>
    <form action="" method="post">
        <label for="n">name:</label>
        <input type="text" name="name" value="<?php $name  ?>" ><br><br>

        <label for="a">address:</label>
        <input type="text" name="address" value="<?php $address  ?>"><br><br>

        <label for="c">contact:</label>
        <input type="text" name="contact" value="<?php $contact ?>"><br><br>

        <input type="submit" name="btn_submit">
    </form>
</div>  

<div>
<h1>Manufacturers</h1>

<?php
    $data=  $db->query("select * from manufacturers");
?>

<table border="1">
        <tr>
            <th> id</th>
            <th> name</th>
            <th> address</th>
            <th> contact </th>
            <th> action</th>
        </tr>


<?php
while ($manufacturers = $data->fetch_object()) {
 echo "
   <tr>
   <th> {$manufacturers->id}</th>
   <th> {$manufacturers->name}</th>
   <th> {$manufacturers->address}</th>
   <th> {$manufacturers->contact}</th>
  <th> <button> <a href='manufacturer.php?id={$manufacturers->id}'>delete</a> </button> </th>
  </tr>
  ";
     }
?>
</table>
</div>


<div>
    <h1>Product</h1>

<?php
$products=  $db->query("select * from products2");
$products= $products->fetch_all(MYSQLI_ASSOC);
?>

<table border="1">
<tr>
 <th> id</th>
 <th> name</th>
 <th>price</th>
 <th> manufacturer_id</th>
</tr>

<?php 
 foreach ( $products as  $products) {
   echo "
   
    <tr>
    <th> {$products['id']}</th>
    <th> {$products['name']}</th>
    <th> {$products['price']}</th>
    <th> {$products['manufacturer_id']}</th>
   </tr>
   ";
 }
        
    
 ?>

</table>

</div>
<div>
    <h1> View </h1>

<?php
$products=  $db->query("select * from view_products");
$products= $products->fetch_all(MYSQLI_ASSOC);
?>

<table border="1">
<tr>
 <th> id</th>
 <th> name</th>
 <th>price</th>
 <th> manufacturer_id</th>
</tr>

<?php 
 foreach ( $products as  $products) {
   echo "
   
    <tr>
    <th> {$products['id']}</th>
    <th> {$products['name']}</th>
    <th> {$products['price']}</th>
    <th> {$products['manufacturer_id']}</th>
   </tr>
   ";
 }
        
    
 ?>

</table>

</div>




</body>
</html>