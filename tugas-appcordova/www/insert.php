<?php
 include "db.php";
 if(isset($_POST['insert']))
 {
 $nama=$_POST['nama'];
 $deskripsi=$_POST['deskripsi'];
 $alamat=$_POST['alamat'];
 $q=mysqli_query($con,"INSERT INTO `panti_asuhan` (`nama`,`deskripsi`,`alamat`) VALUES ('$nama','$deskripsi','$alamat')");
 if($q)
  echo "success";
 else
  echo "error";
 }
 ?>