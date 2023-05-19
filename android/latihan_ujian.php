<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>

<? session_start();
 if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
 

<br>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">

 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Latihan Ujian</h3>
    		  </div> 
    		  <div class="panel-body">
			  
			  <? include "koneksi.php";
			    $materiaktifo = mysql_query("select * from config_app_input_soal_ujian"); 
				while($j = mysql_fetch_array($materiaktifo)){ 
				$batch=$j[3];
				$periode=$j[2];
				if ($_SESSION[ps_prodi]=="PRAMUGARI"){$materiaktif="PRAMUGARI-UJIAN-".$j[2];} 
				if ($_SESSION[ps_prodi]=="STAFF PENERBANGAN"){$materiaktif="STAFF-PENERBANGAN-UJIAN-".$j[2];}
				if ($_SESSION[ps_prodi]=="AVIATION SECURITY"){$materiaktif="AVIATION-SECURITY-UJIAN-".$j[2];}
				$pembayaran_aktif_ke=$j[2]+1; // spesial ditambah 1 karna ujian pertama harus sudah lunas angsuran 2 ya gan, dan ujian ke3 harus lunas angsuran 4
				} 
				
				
				if ($_SESSION['ps_prodi']=="PRAMUGARI") { if ($_SESSION['ps_kampus']=="JAKARTA"){
				$_SESSION['materiujian'] = "SPESIAL-PRAMUGARI-UJIAN-$periode";
				$materiaktif = "SPESIAL-PRAMUGARI-UJIAN-$periode";
				}}
				
				$sq1 = mysql_query("select sum(by_nom) jum from bayar_detail where by_nodaf = '".$_SESSION[ps_nodaf]."' and by_status='verified'");
				
				$arai1 = mysql_fetch_array($sq1);
				////select pasword tahap pembayaran
				$password="-";
				$jumbiaya=0;
				
				
				for ($i = 1; $i <= $pembayaran_aktif_ke ; $i++)
				{
					$sq = mysql_query("select nominal from biaya_pendidikan where pembayaran_ke=$i and jurusan='$_SESSION[ps_prodi]'");
					$t = mysql_fetch_array($sq);
					$jumbiaya=$jumbiaya+$t['nominal'];
				}
				
				
				if ($arai1['jum'] < $jumbiaya)
				{
					echo "<font color=red>Mohon maaf, untuk sementara waktu anda tidak dapat mengakses fitur ini. Terima kasih</font>";} 
				else 
				{
				
				
				
				$sekarang=date("Y-m-d");
				$jummsoal = mysql_query("select count(pertanyaan) from banksoal_akademik where materi='$materiaktif' and tgl_latihan='$sekarang'"); 
				
				//echo "select count(pertanyaan) from banksoal_akademik where materi='$materiaktif' and tgl_latihan='$sekarang'";
				
				while($j = mysql_fetch_array($jummsoal)){ $jumsoal=$j[0]; } if ($jumsoal>1){?>
	
    		  	<iframe src="latihan_ujian_iframe.php" width="100%" height="75%" border=1></iframe>
				
				<?}else{ echo "Mohon maaf, sepertinya hari ini tidak ada soal untuk latihan. Silakan kembali besok pagi. Terima kasih...";}
				
				}?>
				
				
				
				
				
    		  </div> 
			 
    	</div>
		
		
<?}?>