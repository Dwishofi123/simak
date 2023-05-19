
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <? session_start();if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">History Pembayaran</h3>
    		  </div> 
			  
			  <?php $sqpas = mysql_query("select * from bayar_detail where  by_nodaf = '".$_SESSION[ps_nodaf]."' and by_status = 'verified' ");
$n = 1;
	$hit = mysql_num_rows($sqpas); 
	while ($tap = mysql_fetch_array($sqpas)){?>   <div class="panel-body">  <?php echo $n;?>.  Pembayaran Ke <?php echo $n;?> : Rp. <?php  echo number_format($tap['by_nom'],0,',','.');?>,- (Terverifikasi - Dibayarkan <?php echo $tap['by_tgl'] ;?>)
	<!--. Transfer <?php //echo $tap['by_ket'];?>. )   --></div><?php $n++;}  ?>
    		
			  <div class="panel-body">
			  
			  <?php  $s = mysql_query("select sum(by_nom) jm from bayar_detail where  by_nodaf = '".$_SESSION['ps_nodaf']."' and by_status = 'verified'  ");$t = mysql_fetch_array($s);?>
    		  	  <strong>TOTAL BIAYA YANG TELAH DIBAYARKAN : Rp. <?php echo number_format($t['jm'],0,',','.');?>,-</strong><br><br><br>
				  Prosses validasi pembayaran membutuhkan waktu 1 minggu terhitung dari tanggal anda melakukan konfirmasi pembayaran melalui aplikasi ini. Silakan lakukan konfirmasi ke bagian keuangan apabila pembayaran yang telah anda setorkan belum tercantum di history pembayaran anda. 
    		  </div>
			
    	</div><?}?>
		