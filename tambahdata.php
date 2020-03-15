<html>
<head>
<title>Rest Web Services</title>
</head>
<body>
<?php
if (isset ($_POST['id'])) {
$url = 'https://darknear.000webhostapp.com/mahasiswa.php';
//$data = "[{\"nim\":\".$_POST['nim'].\",\"nama\":\".$_POST['nama'].\",\"prodi\":\".$_POST['progdi'].\"}]";//
$data="{\"id\":\"".$_POST['id']."\",\"nama_panti\":\"".$_POST['namapanti']."\",\"alamat\":\"".$_POST['alamat']."\",\"no_telp\":\"".$_POST['no_telp']."\",\"email\":\"".$_POST['email']."\",\"image\":\"".$_POST['image']."\"}";
echo "datanya ".$data;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
echo "response ".$response;
curl_close($ch);
}
?>
<form method="POST" action="tambahjson.php">
<table>
<tr>
<td>ID</td>
<td><input type="text" name="id" id="id"></td>
</tr>
<tr>
<td>Nama Panti</td>
<td><input type="text" name="namapanti" id="nama_panti"></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type="text" name="alamat" id="alamat"></td>
</tr>
<tr>
<td>No Telepon</td>
<td><input type="text" name="no_telp" id="no_telp"></td>
</tr>
<tr>
<td>Emial</td>
<td><input type="text" name="email" id="email"></td>
</tr>
<tr>
<td>Image</td>
<td><input type="text" name="image" id="image"></td>
</tr>
<tr>
<tr>
<td><input type="submit" name="submit" id="submit" value="Tambah"></td>
<td></td>
</tr>
</table>
</form>

</body>
</html>