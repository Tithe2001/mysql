<?php


define("server","localhost");
define("user","root");
define("pass","");
define("database","batch66");

$db=new Mysqli(server,user,pass,database);

// print_r($db);

$data=$db->query("select * from students");

// print_r($data->fetch_all());



?>


<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Result</th>
    <th>Batch</th>
</tr>


<?php
while($row=$data ->fetch_assoc()){

 echo "<tr>
        <th>{$row['id']}</th>
        <th>{$row['name']}</th>
        <th>{$row['result']}</th>
        <th>{$row['batch']}</th>
      </tr>";

}

?>

</table>


