<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>

<?php include "koneksi_kidora_co_id.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Selamat & Sukses Kepada</h3>
    		  </div> 
			  
			  <?php  $sqlnya = "select * from pendaftar_kidora where status_siswa='Sudah Bekerja' order by tgl_kerja desc limit 550"; $ker = mysql_query($sqlnya); $nomor = 1; while($x = mysql_fetch_array($ker)){
				 ?> 
			  
    		  <div class="panel-body">
    		  	<?php echo $nomor;?>. <? echo $x['nama'];?> dari kampus <? echo $x['cabang'];?>  telah sign kontrak pada  <? echo $x['tgl_kerja'];?> di <? echo $x['tempat_kerja'];?>. 
			 </div> 
			 <?php $nomor++;}?>
			 
			  <div class="panel-body"><br>SEMOGA YANG LAIN SEGERA MENYUSUL... AMIN...<br><br><br><br><br><br><br><br><br><br><br><br></div>
			  
			
			  
    	</div>