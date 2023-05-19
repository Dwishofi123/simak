<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>

<?php include "koneksi.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Pengumuman & Pemberitahuan</h3>
    		  </div> 
			  
			  <?php  $sqlnya = "select * from pengumuman order by tanggal desc limit 50"; $ker = mysql_query($sqlnya); $nomor = 1; while($tam = mysql_fetch_array($ker)){
				 ?> 
			  
    		  <div class="panel-body">
    		  	<?php echo $nomor;?>. #<?php echo $tam['nama_pengumuman']?><br><?php echo $tam['isi_pengumuman'];?>
			 </div> 
			 <?php $nomor++;}?>
			  
			
			  
    	</div>