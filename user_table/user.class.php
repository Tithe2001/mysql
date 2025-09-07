<?php
include_once "db_config.php";


class User{

public $id;
public $name;
public $email;
public $password;
public $image;
public $role_id;


public function __construct( $_id, $_name, $_email, $_password, $_image, $_role_id)
{

$this->id= $_id;
$this->name= $_name;
$this->email= $_email;
$this->password= $_password;
$this->image= $_image;
$this->role_id= $_role_id;

}


public function save(){
global $db;
$save= $db->query("insert into users(name,email,password,image,role_id) values('$this->name','$this->email','$this->password','$this->image','$this->role_id')");

if($save){
    return $save;
}

}



public static function getAll(){
global $db;

$data=$db->query("select * from users");
$html="<table border='1'>";

$html.="<tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Password</th> <th>Image</th> <th>Role_ID</th> <th>Action</th> </tr>";

while($row=$data->fetch_object()){
    $html.= "<tr> <td>{$row->id}</td> <td>{$row->name}</td> <td>{$row->email}</td> <td>{$row->password}</td> <td>{$row->image}</td> <td>{$row->role_id}</td> <td> <button><a href='user.app.php?EditId={$row->id}'>Edit</a></button>  <button><a href='user.app.php?id={$row->id}'>Delete</a></button></td>   </tr>";

}

$html.="</table>";
return $html;

}



public function update(){

global $db;
$update= $db->query("update users set name='$this->name', email= '$this->email', password='$this->password', image='$this->image', role_id='$this->role_id' where id='$this->id' ");


if($update){
    return true;
}

}



public static function search($_id){
    global $db;
    $data=$db->query("select * from users where id=$_id");

    $user=$data->fetch_assoc();
    if(count($user)){
        return $user;

    }return "data not found";
  }



public static function delete($_id){

global $db;
 
$delete= $db->query("delete from users where id=$_id "); 

if($delete){
    return "true";
}
}



public function __toString()
  {
    return "$this->id | $this->name| $this->email|  $this->password|  $this->image|  $this->role_id";
  }

}



?>

