<?php
include_once "db_config.php";

if (isset($_POST['btn_submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

$db->query("call add_customers (null, '{$name}','{$email}','{$phone}')  ");

}



if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $db->query('delete from customers where Id= $Id' );
}



// view
// CREATE view view_orders as
// SELECT * from orders where amount>1000000;






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            display:flex;
            gap: 25px;
        }
    </style>
</head>
<body>
<div>
<h2> New Customer</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php $name  ?>" ><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php $email  ?>"><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php $phone  ?>"><br><br>

        <input type="submit" name="btn_submit">
    </form>
</div>



<div>
<h1>Customer</h1>

<?php
    $data=  $db->query("select * from customers");
?>

<table border="1">
        <tr>
            <th> Id</th>
            <th> Name</th>
            <th> Email</th>
            <th> Action</th>
        </tr>


<?php
while ($customer = $data->fetch_object()) {
 echo "
   <tr>
   <th> {$customer->Id}</th>
   <th> {$customer->Name}</th>
   <th> {$customer->Email}</th>
   <th> {$customer->Phone}</th>
  <th> <button> <a href='customer.php?Id={$customer->Id}'>delete</a> </button> </th>
  </tr>
  ";
     }
?>
</table>
</div>




<div>
    <h1>Orders</h1>

<?php
$orders=  $db->query("select * from orders");
$orders= $orders->fetch_all(MYSQLI_ASSOC);
?>

<table border="1">
<tr>
 <th> Id</th>
 <th> date</th>
 <th>amount</th>
 <th> customer_Id</th>
</tr>

<?php 
 foreach ( $orders as  $order) {
   echo "
   
    <tr>
    <th> {$order['Id']}</th>
    <th> {$order['order_date']}</th>
    <th> {$order['amount']}</th>
    <th> {$order['customer_Id']}</th>
   </tr>
   ";
 }
        
    
 ?>

</table>

</div>
<div>
    <h1> View Highest Orders</h1>

<?php
$orders=  $db->query("select * from view_All_orders");
$orders= $orders->fetch_all(MYSQLI_ASSOC);
?>

<table border="1">
<tr>
 <th> Id</th>
 <th> date</th>
 <th>amount</th>
 <th> customer_Id</th>
</tr>

<?php 
 foreach ( $orders as  $order) {
   echo "
   
    <tr>
    <th> {$order['Id']}</th>
    <th> {$order['order_date']}</th>
    <th> {$order['amount']}</th>
    <th> {$order['customer_Id']}</th>
   </tr>
   ";
 }
        
    
 ?>

</table>

</div>

</body>
</html>