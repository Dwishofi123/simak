<?php
session_start();
include "koneksi.php";

$bio = ($_POST['bio']);

$t = date('Y-m-d');
$sql = "update profil_siswa set ps_bio = '$bio'
where ps_nama = '$_SESSION[ps_nama]'";
$sukse = mysql_query($sql);
echo "<script>alert('berhasil di update');window.location='index.php?page=profil';</script>";

?>