<? session_start();?>



<?php
include "system/system/konek.php";
$benar = 0;
$salah = 0;
if($_POST['soal']){
foreach($_POST['soal'] as $key => $value){
    $cek = mysql_query("SELECT * FROM banksoal WHERE soalid=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['jawaban'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}
$jumlah = $_POST['jumlahsoal'];
$tidakjawab = $jumlah - $benar - $salah;
$nilai=round(($benar/$jumlah)*100,2);
?>

<?

}
$tanggal=date('d-m-Y');
$aidi=$_GET[id];
$query= mysql_query("update siswa set tes_online='sudah', Tgl_Test='$tanggal', hasil_tes_online='Benar = $benar<br>Salah =$salah<br>Tidak Jawab = $tidakjawab',nilai_ujian='$nilai' where id=$aidi");
$user=$_SESSION[nama];
mysql_query("insert into tbl_log(datetime,uraian)values('$tanggal','PSPPInt - $user selesai tes online. Nilai $nilai')");

	$_SESSION[ujian_online]="sudah";
	$_SESSION[tanggal_ujian]=$tanggal;
	$_SESSION[hasil_ujian]="Benar = $benar<br>Salah =$salah<br>Tidak Jawab = $tidakjawab<br>";
	$_SESSION[status_login]="aktif";
	$_SESSION[idpendaftaran]=$_GET[id];

?>


<script language="javascript" type="text/javascript">
window.location.href="index.php?&r=tes-online&read=tes-online.html";
</script>