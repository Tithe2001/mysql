<?php

include_once "db_config.php";



// public 
// private 
// protected

class Student{

public $id;
public $name;
public $result;
public $batch;

public function __construct($_id, $_name, $_result,$_batch)
{
    $this->id =$_id;
    $this->name =$_name;
    $this->result =$_result;
    $this->batch =$_batch;
 
}
public function save(){

global $db;
 
$save= $db->query("insert into students (name,result,batch) value('$this->name', '$this->result', '$this->batch')"); 

if($save){
    return "data saved successfully";
}

}



public static function showStudent(){

global $db;
 $data= $db -> query("select * from students");

 $html= "<table>";
 $html.= "<tr><th>ID</th><th>Name</th> <th>Result</th> <th>Batch</th> <th>Action</th></tr>";

while($row= $data->fetch_assoc()){
        $html.= "<tr><td>{$row['id']}</td><td>{$row ['name']}</td> <td>{$row ['result']}</td>  <td>{$row['batch']}</td> <td> <button> <a href='StudentApp.php?EditId={$row ['id']}'>Edit</a></button>  <button> <a href='StudentApp.php?id={$row ['id']}'>Delete</a></button> </td></tr>";
 

}

 $html.= "</table>";
 return  $html;
}





public static function delete($_id){

global $db;
 
$delete= $db->query("delete from students where id=$_id "); 

if($delete){
    return "true";
}
}



public function update(){

global $db;
$update= $db->query("update students set name='$this->name', result= '$this->result', batch= '$this->batch' where id='$this->id' ");

if($update){
    return true;
}

}





 public static function search($_id){
    global $db;
    $data=$db->query("select * from students where id=$_id");

    $student=$data->fetch_assoc();
    if(count($student)){
        return $student;

    }return "data not found";
  }

  
  public function __toString()
  {
    return "$this->id | $this->name| $this->result|  $this->batch";
  }


}



// $student= new Student(5,"Rashed", "Gaibandha");
// $student->save();
// $student->update();
// echo $student;
// Student::delete(1);

// print_r(Student::search(5));
// echo Student::showStudent();
?>


