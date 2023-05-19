<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>


<?php

include "koneksi.php";

$no = ($_GET['no']);

$sql = "delete from fotoselfie 
where id = '$no'";
$sukse = mysql_query($sql);
echo "<script>window.location.href='fotoselfie_iframe.php';</script>";

?>