<? 

mysql_connect("localhost","psppint1_esids","Penerbang4n") or die("tidak bisa koneksi ke database"); mysql_select_db("psppint1_esids");

$db = new mysqli('localhost', 'psppint1_esids' ,'Penerbang4n', 'psppint1_esids');


function open_connection(){

	//konfigurasi
	$host="localhost";
	$user="psppint1_esids";
	$pass="Penerbang4n";
	$db="psppint1_esids";
	
	
	//koneksi database
	$koneksi=mysql_connect($host,$user,$pass);
	mysql_select_db($db,$koneksi);
	
	return $koneksi;
}



?>

