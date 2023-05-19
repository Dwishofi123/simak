<?php session_start();

include "system/system/konek.php";
$tanggal=date("d/m/Y");
$tgls=date("Y-m-d H:i:s");
$namasma=$_POST[nama_sma];

if ($_GET['action']=="tambah")
{


// Cek username di database
$cek_username=mysql_num_rows(mysql_query
             ("select * from siswa where nama='$_POST[nama]' and asal_sekolah='$_POST[nama_sma]'"));
// Kalau username sudah ada yang pakai
if ($cek_username > 0)
{
	echo "Mohon maaf anda sudah pernah mengisi formulir pendaftaran online sebelumnya. <br>Silakan hubungi HOTLINE PSPP PENERBANGAN untuk informasi lebih lengkap. <a href='http://pspp-integrated.com'> << kembali</a>";
}
else
{
$query = mysql_query("select id,nama,asal_sekolah,sumber_informasi,Tgl_pendaftaran from siswa where nama='$_POST[nama]' and asal_sekolah='$_POST[nama_sma]'");	
while($b=mysql_fetch_row($query))
{
	$a=$a+1; $pass=$b[0]; $sumber=$b[3]; $tggl=$b[4];
}




// kroscek apakah sekolah sudah dipresentasi apa belum
$query = mysql_query("select marketing_pengunci from database_sekolah where nama_sma='$namasma'");	
while($b=mysql_fetch_row($query))
{
	$marketing=$b[0]; 
}

if ($marketing=="")
{
	$query = mysql_query("select pemilik from domain where domain='$_GET[info_from]'");	
	while($b=mysql_fetch_row($query))
	{
		$marketing=$b[0]; 
	}
}


//cari nomor hape marketing untuk disertakan di folow up sms

$querykontakmarketing = mysql_query("select nama,hp,email from pegawai where id='$marketing'");	
while($cb=mysql_fetch_row($querykontakmarketing))
{
	$kontakmarketing=$cb[0]." ".$cb[1]."/BBM ".$cb[2]; $hpmarketing2=$cb[1];
}


$nama_clear= str_replace("'", " ", $_POST['nama']);
$nama_clear=stripslashes($nama_clear);

$nama_sma_clear= str_replace("'", " ", $_POST['nama_sma']);
$nama_sma_clear=stripslashes($nama_sma_clear);
$alamat = "$_POST[jalan], RT $_POST[rt], RW $_POST[rw], DESA $_POST[desa], KEL. $_POST[kelurahan], KEC. $_POST[kecamatan], KAB. $_POST[kabupaten], PROV. $_POST[provinsi]";
$alamat_clear= str_replace("'", " ", $alamat);
$alamat_clear=stripslashes($alamat_clear);

$alamat_ortu_clear= str_replace("'", " ", $_POST['alamat_ortu']);
$alamat_ortu_clear=stripslashes($alamat_ortu_clear);

$nama_ortu_clear= str_replace("'", " ", $_POST['nama_ortu']);
$nama_ortu_clear=stripslashes($nama_ortu_clear);

$nama_panggilan_clear= str_replace("'", " ", $_POST['nama_panggilan']);
$nama_panggilan_clear=stripslashes($nama_panggilan_clear);

$queryk = mysql_query("select * from database_sekolah where npsn=$_POST[npsn]");	
while($k=mysql_fetch_row($queryk))
{
	$npsn_sekolah=$k[1]; $nama_sma_clear=$k[2]; $alamat_sekolah=$k[3]; $jenjang_sekolah=$k[4]; $kota_sekolah=$k[5]; $provinsi_sekolah=$k[6];
}

$alamat_sma_clear= str_replace("'", " ", $alamat_sekolah);
$alamat_sma_clear=stripslashes($alamat_sma_clear);

	
$qry="insert into siswa(nama,status_seleksi,jurusan,tempat_kuliah,validasi_pendaftaran,status_daftarulang,Alamat,No_Telp,hp_ortu,Asal_Sekolah,nama_pendidikan_terakhir,Marketing,Tgl_pendaftaran,nama_panggilan,agama,suku,jenis_kelamin,tempat_lahir,hoby,golongan_darah,ukuran_sepatu,ukuran_baju,tinggi_badan,sumber_informasi,berat_badan,motivasi_masuk_pspp,pendidikan_terakhir,alamat_pendidikan_terakhir,pendidikan_formal,kursus,email,bbm,usia,jilbab,nama_ortu,pekerjaan_ortu,alamat_ortu,tanggal_lahir,keterangansumberinfo,npsn,jenjang_sekolah,kota_sekolah,provinsi_sekolah)values('$nama_clear','Belum Diseleksi','$_POST[jurusan] ($_POST[bulan_pendidikan] $_POST[tahun_pendidikan])','$_POST[kampus]','Belum Divalidasi','Belum','$alamat_clear','$_POST[telp]','$_POST[hp_ortu]','$nama_sma_clear','$nama_sma_clear','$marketing','$tanggal','$nama_panggilan_clear','$_POST[agama]','$_POST[suku]','$_POST[jenis_kelamin]','$_POST[tempat_lahir]','$_POST[hobi]','$_POST[golongan_darah]','$_POST[ukuran_sepatu]','$_POST[ukuran_baju]','$_POST[tinggi_badan]','$_GET[info_from]','$_POST[berat_badan]','$_POST[motivasi]','$nama_sma_clear','$alamat_sma_clear','$_POST[pendidikan_formal]','$_POST[kursus]','$_POST[email]','$_POST[bbm]','$_POST[usia]','$_POST[jilbab]','$_POST[nama_ortu]','$_POST[pekerjaan_ortu]','$alamat_ortu_clear','$_POST[tanggal_lahir]','$_POST[uraianpromosi]','$npsn_sekolah','$jenjang_sekolah','$kota_sekolah','$provinsi_sekolah')";

$result=mysql_query($qry);
if($result){
	//JIKA QUERY SUKSES
	//kirim sms pemberitahuan ke marketing bahwa ada siswa yang baru mendaftar di web. 
    $sms="(".$tanggal.") ".$_POST['nama']."[".$_POST['telp']."] dari ".$_POST['nama_sma']." mengisi formulir pendaftaran PSPP melalui ".$_GET['info_from'].". Terima kasih.";
	mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$hpmarketing2','$sms','SMS Info Pendaftaran Siswa ke Marketing','Online')");
}




$query = mysql_query("select max(id) as id from siswa");	
while($b=mysql_fetch_row($query))
{
	$idpendaftaran=$b[0];
}


$query = mysql_query("select reg_format from config");	
while($b=mysql_fetch_row($query))
{
	$reg_format=$b[0]."/".$idpendaftaran; 
}

mysql_query("update siswa set No_Reg='$reg_format' where id='$idpendaftaran'");
$username=$nama_clear;

//kirim sms ke siswa
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_POST[telp]','INFO PSPP Penerbangan. Terima kasih telah mendaftar di PSPP Penerbangan. Silakan hubungi Kak $kontakmarketing untuk melanjutkan prosses pendaftaran. Terima kasih','SMS Pendaftaran','Online')");


//kirimm sms ke orang tua
//mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$_POST[hp_ortu]','INFO PSPP Penerbangan. Hari ini $_POST[nama] telah mengisi biodata pendaftaran di PSPP Penerbangan melalui http://pspp-integrated.com. Terima kasih','SMS Pendaftaran','Online')");
		



//$query = mysql_query("select hp from pegawai where status_pegawai='Aktif' and jabatan='Marketing'");	
//while($b=mysql_fetch_row($query)){ mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$b[0]','$sms','SMS Pendaftaran','Online')");}

//$query = mysql_query("select tujuan from nomor_khusus");	
//while($b=mysql_fetch_row($query)){ mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('$b[0]','$sms','SMS Pendaftaran','Online')");}

$uraianlog="$nama_clear $_POST[nama_sma] reg from $_GET[info_from] , detail : insert into siswa(nama,status_seleksi,jurusan,tempat_kuliah,validasi_pendaftaran,status_daftarulang,Alamat,No_Telp,hp_ortu,Asal_Sekolah,nama_pendidikan_terakhir,Marketing,Tgl_pendaftaran,nama_panggilan,agama,suku,jenis_kelamin,tempat_lahir,hoby,golongan_darah,ukuran_sepatu,ukuran_baju,tinggi_badan,sumber_informasi,berat_badan,motivasi_masuk_pspp,pendidikan_terakhir,alamat_pendidikan_terakhir,pendidikan_formal,kursus,email,bbm,usia,jilbab,nama_ortu,pekerjaan_ortu,alamat_ortu,tanggal_lahir,keterangansumberinfo,npsn,jenjang_sekolah,kota_sekolah,provinsi_sekolah)values($nama_clear,Belum Diseleksi,$_POST[jurusan] ($_POST[bulan_pendidikan] $_POST[tahun_pendidikan]),$_POST[kampus],Belum Divalidasi,Belum,$alamat_clear,$_POST[telp],$_POST[hp_ortu],$nama_sma_clear,$nama_sma_clear,$marketing,$tanggal,$nama_panggilan_clear,$_POST[agama],$_POST[suku],$_POST[jenis_kelamin],$_POST[tempat_lahir],$_POST[hobi],$_POST[golongan_darah],$_POST[ukuran_sepatu],$_POST[ukuran_baju],$_POST[tinggi_badan],$_GET[info_from],$_POST[berat_badan],$_POST[motivasi],$nama_sma_clear,$alamat_sma_clear,$_POST[pendidikan_formal],$_POST[kursus],$_POST[email],$_POST[bbm],$_POST[usia],$_POST[jilbab],$_POST[nama_ortu],$_POST[pekerjaan_ortu],$alamat_ortu_clear,$_POST[tanggal_lahir],$_POST[uraianpromosi],$npsn_sekolah,$jenjang_sekolah,$kota_sekolah,$provinsi_sekolah)";
mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$uraianlog')");




?>


<script language="javascript" type="text/javascript">
window.location.href="login.php?username=<?php echo $_POST[nama_panggilan];?>&pass=<?php echo $idpendaftaran;?>";
</script>

<?php
}
} 

else 
{
	
	if($_POST['nama']=="")
	{
	echo "<script>alert('Terjadi kesalahan pada saat menyimpan data. Data tidak disimpan!');window.location='index.php?&r=biodata&id=$_GET[id]&read=biodata-pendaftaran-online.html';</script>";
	//	echo "<script>alert('Terjadi kesalahan pada saat menyimpan data. Data tidak disimpan!');window.location='isi_biodata.php?id=$_GET[id]&read=biodata-pendaftaran-online.html';</script>";
	}
	else
	{
		
		//QUERY UNTUK MENGECEK STATUS SELEKSI PENDAFTAR
	$kueriseleksi = mysql_query("select status_seleksi from siswa where ID = '$_GET[id]'");
	$cetakseleksi = mysql_fetch_array($kueriseleksi);
	if($cetakseleksi['status_seleksi'] <> "Belum Diseleksi")
	{	
	echo "<script>alert('Data tidak bisa diubah, karna sistem sudah terkunci.');window.location='index.php?&r=biodata&id=$_GET[id]&read=biodata-pendaftaran-online.html';</script>";
	//echo "<script>alert('Data tidak bisa diubah, karna sistem sudah terkunci.');window.location='isi_biodata.php?&r=biodata&id=$_GET[id]&read=biodata-pendaftaran-online.html';</script>";
	}
	else
	{
		

if ($_POST['nama_sma']=="")
{

}
else
{

$nama_clear= str_replace("'", " ", $_POST['nama']);
$nama_clear=stripslashes($nama_clear);

$nama_sma_clear= $_POST['nama_sma'];

$alamat_sma_clear= str_replace("'", " ", $_POST['alamat_sma']);
$alamat_sma_clear=stripslashes($alamat_sma_clear);

$alamat_clear= str_replace("'", " ", $_POST['alamat']);
$alamat_clear=stripslashes($alamat_clear);

$alamat_ortu_clear= str_replace("'", " ", $_POST['alamat_ortu']);
$alamat_ortu_clear=stripslashes($alamat_ortu_clear);

$nama_ortu_clear= str_replace("'", " ", $_POST['nama_ortu']);
$nama_ortu_clear=stripslashes($nama_ortu_clear);

$nama_panggilan_clear= str_replace("'", " ", $_POST['nama_panggilan']);
$nama_panggilan_clear=stripslashes($nama_panggilan_clear);


mysql_query("update siswa set nama='$nama_clear',Alamat='$alamat_clear',No_Telp='$_POST[telp]',hp_ortu='$_POST[hp_ortu]',nama_panggilan='$nama_panggilan_clear',agama='$_POST[agama]',suku='$_POST[suku]',jenis_kelamin='$_POST[jenis_kelamin]',tanggal_lahir='$_POST[tanggal_lahir]',tempat_lahir='$_POST[tempat_lahir]',hoby='$_POST[hobi]',golongan_darah='$_POST[golongan_darah]',ukuran_sepatu='$_POST[ukuran_sepatu]',ukuran_baju='$_POST[ukuran_baju]',tinggi_badan='$_POST[tinggi_badan]',berat_badan='$_POST[berat_badan]',motivasi_masuk_pspp='$_POST[motivasi]',pendidikan_formal='$_POST[pendidikan_formal]',kursus='$_POST[kursus]',email='$_POST[email]',bbm='$_POST[bbm]',usia='$_POST[usia]',jilbab='$_POST[jilbab]',nama_ortu='$_POST[nama_ortu]',pekerjaan_ortu='$_POST[pekerjaan_ortu]',alamat_ortu='$alamat_ortu_clear' where id='$_GET[id]'");


//SIMPAN URAIAN LOG INPUT DATA
$uraianlog="$nama_clear update data set nama=$nama_clear,jurusan=$_POST[jurusan],tempat_kuliah=$_POST[kampus],Alamat=$alamat_clear,No_Telp=$_POST[telp],hp_ortu=$_POST[hp_ortu],Asal_Sekolah=$nama_sma_clear,nama_pendidikan_terakhir=$nama_sma_clear,nama_panggilan=$nama_panggilan_clear,agama=$_POST[agama],suku=$_POST[suku],jenis_kelamin=$_POST[jenis_kelamin],ttl=$_POST[ttl],hoby=$_POST[hobi],golongan_darah=$_POST[golongan_darah],ukuran_sepatu=$_POST[ukuran_sepatu],ukuran_baju=$_POST[ukuran_baju],tinggi_badan=$_POST[tinggi_badan],berat_badan=$_POST[berat_badan],motivasi_masuk_pspp=$_POST[motivasi],pendidikan_terakhir=$nama_sma_clear,alamat_pendidikan_terakhir=$alamat_sma_clear,pendidikan_formal=$_POST[pendidikan_formal],kursus=$_POST[kursus],email=$_POST[email],bbm=$_POST[bbm],usia=$_POST[usia],jilbab=$_POST[jilbab] where id=$_GET[id]";
mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$uraianlog')");
}

?>
<script language="javascript" type="text/javascript">
window.location.href="index.php?&r=biodata&id=<?php echo $_GET['id'];?>&read=biodata-pendaftaran-online.html";
//window.location.href="isi_biodata.php?&r=biodata&id=<?php echo $_GET['id'];?>&read=biodata-pendaftaran-online.html";
</script>
<?php 

} 
}
}
?>
