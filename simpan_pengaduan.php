<? session_start();

if ($_POST[uraian_pengaduan]==""){ echo "<script>location.href ='index.php';</script>";}
?>

<script type="text/javascript"><?php date_default_timezone_set('Asia/Jakarta'); ?></script><?php 
include "system/system/konek.php";$isi = $_POST['uraian_pengaduan'];$jenis = $_POST['jenis'];$tgl = date("Y-m-d H:i:s");$sql = ("insert into pengaduan_layanan (id,tanggal,jenis,uraian,user) values ('','$tgl','$jenis','$isi','$_SESSION[nama] - $_SESSION[asal_sekolah]')");
$kue = mysql_query($sql); if($kue=true){ echo "<script>window.location='index.php?r=suksespengajuan';</script>"; } else { echo "Maaf, Terjadi kesalahan pada saat input data.. <script>window.location='index.php';</script>"; } ;?>
	
	
	