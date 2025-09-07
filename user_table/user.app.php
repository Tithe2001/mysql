<?php
session_start();

if(!isset($_SESSION["name"])){
   header("location:login.php");
}


include_once "user.class.php";

 if(isset($_POST['btn_submit'])){
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    $role_id = $_POST['role_id'];
    
    $user= new User("", $name, $email, $password, $image, $role_id);
    $save= $user->save();
    if($save){
      echo $save;
      // unset($_POST['id']);
      unset($_POST['name']);
      unset($_POST['email']);
      unset($_POST['password']);
      unset($_POST['image']);
      unset($_POST['role_id']);
     
    } 

 }


//  update

if(isset($_POST['btn_update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    $role_id = $_POST['role_id'];
    
    $user= new User($id,$name,$email, $password, $image, $role_id);
    $update= $user->update();
    if($update){
      echo $update;
      unset($_POST['id']);
      unset($_POST['name']);
      unset($_POST['email']);
      unset($_POST['password']);
      unset($_POST['image']);
      unset($_POST['role_id']);
    } 

 }

//  search
 $search_user=null;
  if(isset($_GET['EditId'])){
    $id= $_GET['EditId'];
    $search_user =  User::search($id);

    
  }


// delete

if(isset($_GET['id'])){
    $id= $_GET['id'];
    User::delete($id);
  }



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
     </style>
</head>

<body>

<div>
    <h1>User Table</h1>
    <a href="user.app.php">New User</a>

    <?php 
    echo  User::getAll(); 
    ?>

</div>

<?php 
if( is_null($search_user ) ){
?>

 
<div>
<h1> New User</h1>
<form action="" method="POST">
     <label for="n">Id</label> <br>
     <input type="text" name="id" id="id"> <br> <br> 
    <label for="n">Give Your Name:</label> <br>
    <input type="text" name="name" id="name"> <br> <br>
    <label for="n">Give Your Email:</label> <br>
    <input type="text" name="email" id="email"> <br> <br>
    <label for="n">Password:</label> <br>
    <input type="password" name="password" id="password"> <br> <br>
    <label for="n">Image:</label> <br>
    <input type="text" name="image" id="image"> <br> <br>
    <label for="n">Role ID:</label> <br>
    <input type="text" name="role_id" id="role_id"> <br> <br>

    <input type="submit" name="btn_submit" value="submit">
</form>
</div>
    

<?php

}else{

?>


<div>
<h1> Update User</h1>
<form action="" method="POST">
    <label for="n">Id</label> <br> 
    <input type="text" name="id" id="id" value="<?php echo $search_user['id'] ?>"> <br> <br>
    <label for="n">Give Your Name:</label> <br>
    <input type="text" name="name" id="name" value="<?php echo $search_user['name'] ?>"> <br> <br>
    <label for="n">Give Your Email:</label> <br>
    <input type="text" name="email" id="email" value="<?php echo $search_user['email'] ?>"> <br> <br>
    <label for="n">Password:</label> <br>
    <input type="password" name="password" id="password" value="<?php echo $search_user['password'] ?>"> <br> <br>
    <label for="n">Image:</label> <br>
    <input type="text" name="image" id="image" value="<?php echo $search_user['image'] ?>"> <br> <br>
    <label for="n">Role ID:</label> <br>
    <input type="text" name="role_id" id="role_id" value="<?php echo $search_user['role_id'] ?>"> <br> <br>

    <input type="submit" name="btn_update" value="update" >
</form>

</div>

<?php
}
?>




</body>
</html>