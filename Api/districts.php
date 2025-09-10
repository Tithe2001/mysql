<?php
include_once "db_config.php";

$data=json_decode(file_get_contents("php://input"));

if(isset($data->id)){
$id=$data->id;
$stmt=$db->query("select * from districts where division_id=$id");
$data=$stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);

}




?>