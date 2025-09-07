<?php


session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



include_once "db_config.php";


if(isset($_POST["btn_login"])){
    $name=$_POST["name"];
    $password=$_POST["password"];
    $message=[];



$stmt= $db->query("select users.name, users.password, roles.name as role from users, roles where users.name='$name' or users.email='$name' and users.password='$password'
and users.role_id=roles.id" );
$data=$stmt->fetch_assoc();

// print_r($data);

    if(count($data)){
        $message=["login"=>"Welcome {$data['name']} " ];
        $_SESSION["name"]=$data['name'];
        $_SESSION["role"]=$data['role'];
        header("location:user.app.php");
    }else{
        $message=["login"=>"Incorrect user name or password !"];
    }
    echo $message["login"];
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <style>
        .f{
            text-align: center;
            background-color: gray;
        }

        body{
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

    </style>
</head>
<body>

<fieldset style="width: 300px;" class="f">
    <h1>Please Login First</h1><br>
<form action="login.php" method="POST" >
        <label for="name">Username</label><br>
        <input type="text" id="name"  name="name"><br><br>

        <label for="password">Password</label><br>
        <input type="passwprd" id="passwprd"  name="password"><br><br>

        
        <input type="submit" value="login" name="btn_login" style="background-color: green;" >
        
        
    </form>
</fieldset>
    
</body>
</html> 