<?php
session_start();date_default_timezone_set("Asia/Jakarta");include "system/system/konek.php";$browser = $_SERVER['HTTP_USER_AGENT'];$ip=$_SERVER['REMOTE_ADDR'];$tgls=date("Y-m-d H:i:s");

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','jpeg');
$file_php = array('php');
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0)
{
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed))
	{

				$nama_file = $_FILES['upl']['name'];
				//JIKA FILE UPLOADNYA PHP MASUKKAN KE TABLE LOG
				mysql_query("insert into tbl_log (ID,DATETIME,URAIAN) VALUES ('','$tgls','$tgls : BACKDOOR ALLERT! $ip try to upload $nama_file with Browser $browser')");
				echo '{"status":"error"}';
				exit;

	}
	else
	{
		//JIKA FILE BERUPA GAMBAR
		if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/foto-'.$_SESSION['idpendaftaran'].'.jpg'))
		{
			echo '{"status":"success"}';
			exit;
		}
	}
	

}
else
{
	echo '{"status":"error"}';
	exit;
}

?>