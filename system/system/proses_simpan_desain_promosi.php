<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">

<?php
include "konek.php";function RandomCode($max){ $char = array("A","B","C","D","E","F","G","H","J","K","L","M","N","N","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","j","k","k","l","m","n","p","q","r","s","t","u","v","v","w","x","z","x",);
			$keys = array();
	while (count($keys) < $max) { 
		$x = mt_rand(0, count($char) - 1);
		if (!in_array($x, $keys)) {
			$keys[] = $x;
			}
		}
		$random = '';
		foreach ($keys as $key => $val){
				$random .= $char[$val];
				}
			return $random;
}
$foto=$_FILES['foto']['name'];$tifoto=$_FILES['foto']['type'];$upload=$_POST['upload'];$stringasli = RandomCode(4);$stringedit =  str_replace(" ", "_", $stringasli);$kps = str_replace(' ','-',strtolower($foto));
$kpi = substr($kps, strrpos($kps, '.'));$kpi = str_replace('.','',$kpi);$kpsi = $stringedit.'.'.$kpi;if(($tifoto != "image/jpeg" && $tifoto != "image/png")) { echo "<script> window.location='uploadpromo.php';</script>"; } else { date_default_timezone_set('Asia/Jakarta');$judul = $_POST['judul'];$t = date('Y-m-d H:i:s');$sql = mysql_query("insert into desain_promo (id,tanggal, judul, upload_by,foto) values ('','$t','$judul','$upload','$kpsi')") or die("".mysql_error()); $namfile=$_FILES['foto']['tmp_name'];$direk='../img/promo/';$uploads = $direk.$kpsi;move_uploaded_file ($namfile,$uploads);	echo "<script> window.location='uploadpromo.php';</script>"; } ?>