<?php
session_start();
include "koneksi.php";

$isi = ($_POST['pesan']);


if (empty($isi)) { 
echo "<script>alert('Mohon maaf, anda belum memasukkan pesan motivasi. Silakan diulang..');window.location='index.php?page=motivasi';</script>"; }


$t = date('Y-m-d');
$sql = "insert into motivasi (id, isi_teks, dikirim_oleh, tanggal, pub) values ('','$isi','$_SESSION[ps_nama] - PSPP $_SESSION[ps_kampus]','$t','false')";
$sukse = mysql_query($sql) or die ("".mysql_error());
echo "<script>alert('Terima kasih atas partisipasinya. Pesan anda sudah terkirim dan segera kami lakukan pengecekan agar bisa tampil di halaman motivasi. Terima kasih');window.location='index.php?page=motivasi';</script>";

?>