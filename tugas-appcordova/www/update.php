<?php
 include "db.php";
 if(isset($_POST['update']))
 {
 $id=$_POST['id'];
 $nama=$_POST['nama'];
 $deskripsi=$_POST['deskripsi'];
 $alamat=$_POST['alamat'];
 $q=mysqli_query($con,"UPDATE `panti_asuhan` SET `nama`='$nama',`deskripsi`='$deskripsi',`alamat`='$alamat' where `id`='$id'");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>