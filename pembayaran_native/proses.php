<?php
include "koneksi.php";
$order_id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$biaya = 250000;
$status = 1;
$cek = mysqli_query($koneksi, "insert into pembayaran (id,nama,alamat,email,biaya,status,order_id) VALUES 
('','$nama','$email','$alamat','$biaya','$status','$order_id')");
if($cek)
{
	echo "SUBMIT PEMBAYARAN BERHASIL";
}
else
	
	{
		echo "gagal";
	}
header("location:./midtrans/examples/snap-redirect/checkout-process.php?order_id=$order_id");

?>