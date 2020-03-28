<?php
include "db.php";
$data=array();
$q=mysqli_query($con,"SELECT * from `panti_asuhan`");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>