<?php
include_once "db_config.php";

if (isset($_POST['btn_submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

$db->query("call add_customers (null, '{$name}','{$email}','{$phone}')  ");

}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->query("delete from customers where id= $id");
}

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
   <th> {$customer->id}</th>
   <th> {$customer->name}</th>
   <th> {$customer->email}</th>
  <th> <button> <a href='customer.php?id={$customer->id}'>delete</a> </button> </th>
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
 <th>amount</th>
 <th> date</th>
 <th> customer_id</th>
</tr>

<?php 
 foreach ( $orders as  $order) {
   echo "
   
    <tr>
    <th> {$order['id']}</th>
    <th> {$order['amount']}</th>
    <th> {$order['order_date']}</th>
    <th> {$order['customer_id']}</th>
   </tr>
   ";
 }
        
    
 ?>

</table>

</div>

</body>
</html>