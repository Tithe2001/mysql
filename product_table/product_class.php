<?php

include_once "db_config.php";


class Product{

public $id;
public $name;
public $description;
public $price;
public $offer_price;


public function __construct($_id,$_name,$_description,$_price,$_offer_price)
{
 $this->id=$_id;   
 $this->name=$_name;   
 $this->description=$_description;   
 $this->price=$_price;   
 $this->offer_price=$_offer_price;   
}




public function save(){
global $db;

$save=$db->query("insert into products (name,description,price,offer_price) values('$this->name','$this->description','$this->price','$this->offer_price') ");

if($save){
    return $save;
}
}




public static function getAll(){

global $db;

$data= $db->query(" select * from products ");

$html="<table>";


$html.="<tr> <th>ID</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Offer Price</th> <th>Action</th> </tr>";

while($row=$data->fetch_object()){
    $html.= "<tr> <td>{$row->id}</td> <td>{$row->name}</td> <td>{$row->description}</td> <td>{$row->price}</td> <td>{$row->offer_price}</td> <td> <button><a href='product_app.php?edit_id={$row->id}'>Edit</a></button>  <button><a href='product_app.php?id={$row->id}'>Delete</a></button></td>   </tr>";

}

$html.="</table>";
return $html;
}




public function update(){
global $db;

$update=$db->query("update products set name='$this->name', description='$this->description',price='$this->price',offer_price='$this->offer_price' where id='$this->id'   ");

if($update){
    return true;
}

}




public static function edit($_id){
    global $db;
    $data=$db->query("select * from products where id=$_id");

    $product=$data->fetch_assoc();
    if(count($product)){
        return $product;

    }return "data not found";
  }



public static function delete($_id)  {
    global $db;

    $delete=$db->query(" delete from products where id='$_id' ");
if($delete){

    return true;
}


}



public function __toString()
{
    return "  $this->id|$this->name| $this->description| $this->price| $this->offer_price  ";
}



}





// $pro1= new Product("","TV"," 1st ever OLED TV IN BD",10000001.00,100000000.00 );

// $pro1->save();




?>