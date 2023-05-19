

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <? session_start();if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Tagihan Pembayaran</h3>
    		  </div> 
		  <?php $sqpas = mysql_query("select * from biaya_pendidikan where jurusan = '".$_SESSION[ps_prodi]."'");
		  
		$n =1; while ($tamp = mysql_fetch_array($sqpas)){ ?>  <div class="panel-body"> <?php echo $n;?>. Biaya <?php echo $tamp['tahap']; ?> :  
		<?php echo "Rp ". number_format($tamp['nominal'],0,',','.');?>,-  <?php echo $tamp['keterangan'];
	$n++;?> </div> <?php	}
?>
    		  
			 
			  <div class="panel-body">
    		  	  <strong> <?php $sqpas = mysql_query("select sum(nominal) jm from biaya_pendidikan where jurusan = '".$_SESSION[ps_prodi]."'");
				  $ar = mysql_fetch_array($sqpas);
				  ?>TOTAL BIAYA PENDIDIKAN YANG HARUS DIBAYARKAN : <?php echo "Rp ". number_format($ar['jm'],0,',','.');?>,-</strong>
    		  </div>
			  <div class="panel-body" >
<?php			  
$sq1 = mysql_query("select sum(by_nom) jum from bayar_detail where by_nodaf = '".$_SESSION['ps_nodaf']."' ");
	$arai1 = mysql_fetch_array($sq1);?>

    		      Saat ini anda telah membayarkan biaya pendidikan sebesar Rp. <?php echo  number_format($arai1['jum'],0,',','.');?>,-.
				  <a href="index.php?page=pembayaran">Klik disini</a> untuk melihat history pembayaran.
    		  </div> 
    	</div><?}?>