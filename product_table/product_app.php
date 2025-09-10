<?php
include_once "product_class.php";

//save

if(isset($_POST['btn_submit'])){
$name= $_POST['name'];
$description= $_POST['description'];
$price= $_POST['price'];
$offer_price= $_POST['offer_price'];

$product= new Product("",$name,$description,$price,$offer_price);
$save=$product->save();

if($save){
    echo $save;

    unset ($_POST['name']);
    unset ($_POST['description']);
    unset ($_POST['price']);
    unset ($_POST['offer_price']);
}
}



//update

if(isset($_POST['btn_update'])){
$id = $_POST['id'];
$name= $_POST['name'];
$description= $_POST['description'];
$price= $_POST['price'];
$offer_price= $_POST['offer_price'];

$product= new Product($id,$name,$description,$price,$offer_price);
$update=$product->update();

if($update){
    echo $update;

    unset ($_POST['id']);
    unset ($_POST['name']);
    unset ($_POST['description']);
    unset ($_POST['price']);
    unset ($_POST['offer_price']);
}
}


//edit

$edit_product=null;
if(isset($_GET['edit_id'])){
$id=$_GET['edit_id'];
$edit_product= Product::edit($id);

}

//delete
if(isset($_GET['id'])){
    $id=$_GET['id'];
    Product:: delete($id);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
<style>
    body{
            display: flex;
            place-content: center;
            gap: 20px;
        }
        table,th,td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 10px;
        }

        tr:nth-child(even){
           background-color: lightgrey;
        }

        .f{
            background-color: beige;
            
        }
     </style>


</head>
<body>
<div>
    <h1>Product Table</h1>
    <a href="product_app.php">New Product</a>

    <?php
    echo Product::getAll();
    ?>
</div>

<?PHP
if(is_null($edit_product)){

?>

<div>
<h1>Product</h1>
<form action="" method="post" class="f">
    <!-- <label for="id">Id</label> <br>
     <input type="text" name="id" id="id"> <br> <br>  -->

    <label for="n">Product Name:</label> <br>
    <input type="text" name="name" id="n"> <br> <br>

    <label for="d">Product Description:</label> <br>
    <input type="text" name="description" id="d"> <br> <br>

    <label for="p">Price:</label> <br>
    <input type="text" name="price" id="p"> <br> <br>

    <label for="o">Offer Price:</label> <br>
    <input type="text" name="offer_price" id="o"><br><br>

    <input type="submit" name="btn_submit" value="submit">


</form>
</div>

<?php
}else{
?>

<div>
<h1> Update Product</h1>
<form action="" method="post" class="f">
    <label for="id">Id</label> <br>
     <input type="text" name="id" id="id" value="<?php echo $edit_product['id']  ?>" > <br> <br> 

    <label for="n">Product Name:</label> <br>
    <input type="text" name="name" id="n" value="<?php echo $edit_product['name']  ?>"> <br> <br>

    <label for="d">Product Description:</label> <br>
    <input type="text" name="description" id="d" value="<?php echo $edit_product['description']  ?>"> <br> <br>

    <label for="p">Price:</label> <br>
    <input type="text" name="price" id="p" value="<?php echo $edit_product['price']  ?>"> <br> <br>

    <label for="o">Offer Price:</label> <br>
    <input type="text" name="offer_price" id="o" value="<?php echo $edit_product['offer_price']  ?>"><br><br>
    
 

    <input type="submit" name="btn_update" value="update">


</form>
</div>

<?php
}
?>


</body>
</html>