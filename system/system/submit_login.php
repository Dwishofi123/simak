<?  session_start(); ?>
<div style="visibility:hidden;">
<?
$tanggal=date("Y-m-d H:i:s");
$browser = $_SERVER['HTTP_USER_AGENT'];
$_SESSION[cari_tanggal]=$tgl;
include "konek.php";
$aidi=  explode(" | ",$_POST[aidi]);
$pass= $_POST[pass];
$ip=$_SERVER['REMOTE_ADDR'];
$pc_name=gethostbyaddr($_SERVER['REMOTE_ADDR']);

$query = mysql_query("select * from pegawai where password='$pass' and id='$aidi[1]'"); $a="0"; 
while($b=mysql_fetch_array($query)) 
{ 
	$a="1"; 
	$_SESSION[id_login]=$b[0]; 
	$_SESSION[nama_login]=$b[nama]; 
	$_SESSION[unit]=$b[unit]; 
	if($b[jabatan]=="Marketing")
	{
		$_SESSION[user_marketing]="ya";}else{$_SESSION[user_marketing]="bukan";}
}
if ($a=="1"){
$stat_login="masuk";
$_SESSION[status_login]="true";
$_SESSION[pikachu]="Aktif";
$queryu = mysql_query("select psb_aktif from config"); 
while($c=mysql_fetch_array($queryu)) 
{ $_SESSION['psb.aktif']=$c[psb_aktif];}

mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','PSPPInt OldSys - $aidi[0] LOGIN from $pc_name $browser IP $ip')");
$quer = mysql_query("select * from hak_akses where user_id='$aidi[1]'"); while($a=mysql_fetch_row($quer)) {
if ($a[2]=="Yes"){ $_SESSION[hak_input_psb]="true"; }
if ($a[3]=="Yes"){ $_SESSION[hak_input_daftar_ulang]="true"; }
if ($a[4]=="Yes"){ $_SESSION[hak_akses_data_siswa_daftar_ulang]="true"; }
if ($a[5]=="Yes"){ $_SESSION[hak_akses_validasi_holding]="true"; }
if ($a[6]=="Yes"){ $_SESSION[hak_akses_data_siswa]="true"; }
if ($a[7]=="Yes"){ $_SESSION[hak_akses_perlengkapan_siswa]="true"; }
if ($a[8]=="Yes"){ $_SESSION[hak_akses_pengumuman_siswa]="true"; }
if ($a[9]=="Yes"){ $_SESSION[hak_akses_jadwal_belajar]="true"; }
if ($a[10]=="Yes"){ $_SESSION[hak_akses_bayar_angsuran_siswa]="true"; }
if ($a[11]=="Yes"){ $_SESSION[hak_akses_input_kasbon]="true"; }
if ($a[12]=="Yes"){ $_SESSION[hak_akses_pengajuan_anggaran]="true"; }
if ($a[13]=="Yes"){ $_SESSION[hak_akses_acc_pengajuan_anggaran]="true"; }
if ($a[14]=="Yes"){ $_SESSION[hak_akses_laporan_keuangan]="true"; }
if ($a[15]=="Yes"){ $_SESSION[hak_akses_public]="true"; }
if ($a[16]=="Yes"){ $_SESSION[hak_akses_absensi_siswa]="true"; }
if ($a[17]=="Yes"){ $_SESSION[hak_akses_absensi_pegawai]="true"; }
if ($a[18]=="Yes"){ $_SESSION[hak_akses_penggajian]="true"; }
if ($a[19]=="Yes"){ $_SESSION[hak_edit_wilayah_presentasi]="true"; }
if ($a[20]=="Yes"){ $_SESSION[sms]="true"; }
if ($a[21]=="Yes"){ $_SESSION[kritikdansaran]="true"; }
if ($a[22]=="Yes"){  $_SESSION['input_interview']="true"; }
}
 
?>

 <script type="text/JavaScript">
setTimeout(function () {
   window.location.href = "../index.php"; //will redirect to your blog page (an ex: blog.html)
}, 1); //will call the function after 1 secs.
</script>

<? } else{ mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','PSPPInt Sys - $aidi[0] gagal LOGIN with $pc_name IP $ip dengan passsword $pass with $browser')");?>
 <script type="text/JavaScript">
setTimeout(function () {
   window.location.href = "../login.php?validasi=gagal"; //will redirect to your blog page (an ex: blog.html)
}, 1); //will call the function after 1 secs.
</script>

<? }?></div>
