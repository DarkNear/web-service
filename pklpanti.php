<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo "isinya data===".$request;
echo "method===".$method;
echo "|||";
//$input = json_decode(file_get_contents('php://input'),true);
 $input = file_get_contents('php://input');
$link = mysqli_connect('localhost', 'id12789027_kita', '123456', 'id12789027_bajukita');
mysqli_set_charset($link,'utf8');
 
$data = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
echo "isinya data===".$data;
echo "|||";
$id = array_shift($request);
echo "isinya data===".$id;
echo "|||";


if (strcmp($data, $data) ==0) {
 switch ($method) {
 case 'GET':
     {
    if (empty($id))
    {
    $sql = "select * from pantiasuhan"; 
    echo "select * from pantiasuhan ";break;
    }
    else
    {
         $sql = "select * from pantiasuhan where id='$id'";
         echo "select * from pantiasuhan where id='$id'";break;
        
        
    }
    
    
    
    
     }
 }
 
 
 

 
 
 
 
 
 if ($method == 'GET') {
 $hasil=array(); $result = mysqli_query($link,$sql);
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 {
 $hasil[]=$row;
 } 
 $hasil1 = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
 echo json_encode($hasil1);
 
 } 
   
}

else{
 $hasil1 = array('status' => false, 'message' => 'Access Denied');
 echo json_encode($hasil1);
}

if ($method == 'POST') {
        echo "Method POST";
        echo "Data input ".$input;
        
        ////
        
        $json = json_decode($input, true);
        echo "json =".$json["id"] ;
        echo "Proses".$json->id;
        $id=$json["id"];
        $namapanti=$json["nama_panti"];
        $alamat=$json["alamat"];
        $notelp=$json["no_telp"];
        $email=$json["email"];
        $image=$json["image"];
		$querycek = "SELECT id,nama_panti,alamat,no_telp,email,image FROM pantiasuhan WHERE id =$id";
		echo "query select ".$querycek;
		$result=mysqli_query($link,$querycek);
		
		
		if ( $rowcount == 0)
		{
		$query = "INSERT INTO pantiasuhan (
		id,
		nama_panti,
		alamat,
		no_telp,
		email,
		image)
		VALUES (				
		'$id',
		'$namapanti',
		'$alamat',
		'$notelp',
		'$email',
		'$image')";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
		else if ($rowcount > 0)
		{
		$query = "UPDATE mahasiswa SET
		nama_panti = '$namapanti',
		alamat = '$alamat',
		no_telp ='$notelp',
		email ='$email',
		image ='$image'
		WHERE id ='$id'";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
        
        
        
        
        /////
        }
        
mysqli_close($link);
?>