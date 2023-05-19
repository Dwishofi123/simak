
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
  
  <meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <? session_start();

if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
   <script type="text/javascript">
  $(document).ready(function(){
	  $("#tgl_awal").datepicker({
		altFormat : "dd MM yy",
		changeMonth : true,
		changeYear : true
		});
	  $( "#tgl_awal").change(function(){
		  $( "#tgl_awal").datepicker( "option", "dateFormat","yy-mm-dd");
		  
	  });
  }
  
  );
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
	  $("#tgl_akhir").datepicker({
		altFormat : "dd MM yy",
		changeMonth : true,
		changeYear : true
		});
	  $( "#tgl_akhir").change(function(){
		  $( "#tgl_akhir").datepicker( "option", "dateFormat","yy-mm-dd");
		  
	  });
  }
  
  );
  </script>
<br>

	
	
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Jadwal Kuliah</h3>
    		  </div> 
			   <div class="panel-body">
							<!--<form action="index.php?pilih=jadwal&pilih=jadwal" method="post"><br>
Cari Jadwal KBM Anda <br><br>
    <div class="table-responsive">
	<table>
    <tr>
  <td>Dari Tanggal</td><td>:</td>
  <td><input type="text" size="10" name="tgl_awal" id="tgl_awal" /></td>
 </tr>
 <tr>
  <td>Sampai Tanggal</td><td>:</td>
  <td><input type="text" size="10" name="tgl_akhir" id="tgl_akhir" / ></td>
 </tr>
 
 <tr><br><br>
  <td colspan="3"><input type="submit" target="_blank"  value="CARI" name="submit" /></td>
 </tr>
 <br><br>
   </table>
   </div>
  </form>-->
<?php 
@$pilih=$_GET['pilih'];
switch($pilih)
{

default:
?> 			
<?php
$tglskrg = date('Y-m-d');
$bulan = date('m');
$sqle = "select * from akademik_rencana_kbm where prodi = '".$_SESSION['ps_prodi']."' and date_format((tanggal),'%m') like '%$bulan%'  order by tanggal desc";
$kueri = mysql_query($sqle) ;
$hitung = mysql_num_rows($kueri); echo "</br>";
if($hitung == 0){echo "Tidak ada data yang dapat ditampilkan.</br>";}
else{?>
  <div class="table-responsive">
                                <table >
							<tr>
								<th >No</th>
							
								<th>Hari, Tanggal</th>
								<th>Jam mulai</th>
								<th>Sesi</th>
								<th>Mata Kuliah</th>
							
								<th>Instruktur</th>

								
							</tr>
	<?php $nomornya = 1;?>
	<?php while($data = mysql_fetch_array($kueri)){
	
	$tgl = $data['tanggal'];
	$harinya = date('D', strtotime($tgl));
$arai = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$bulanya = date('m', strtotime($tgl));
$tahunya = date('Y' , strtotime($tgl));
$araibulan = array(
'01' => 'Januari',
'02' => 'Febrari','03' => 'Maret',
'04' => 'April','05' => 'Mei',
'06' => 'Juni','07' => 'Juli',
'08' => 'Agustus','09' => 'September',
'10' => 'Oktober','11' => 'November',
'12' => 'Desember'

);	
$tgl2 = date( 'd', strtotime($tgl));

			echo "	<tr>
								<td>".$nomornya."</td>
							
								
								
							
								<td>$arai[$harinya] , $tgl2 $araibulan[$bulanya] $tahunya</td>
								<td>".$data['jam_mulai']."</td>
								
								<td>".$data['sesi']."</td>
								<td>".$data['mata_kuliah']."</td>
		
								<td>".$data['instruktur']."</td>
								
							
								";?>
						
						</tr>
							<?php
		$nomornya++;
	}?></table>
<?php
	
}?>		
                          
                  </div>
             </div>
      </div>
      
    
</div><?php break; 
case "jadwal" ; 
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$sqle = "select * from akademik_rencana_kbm where kampus = '".$_SESSION[ps_kampus]."' and tanggal  between '$tgl_awal' and '$tgl_akhir' order by tanggal desc";
$kueri = mysql_query($sqle);
$hitung = mysql_num_rows ($kueri);echo "</br>";
if($hitung == 0){echo "Maaf Data Tidak Ada</br>";}
else{?>

                                <table class="table table-hover">
							<tr>
								<th >No</th>
							
								<th>Hari, Tanggal</th>
								<th>Jam mulai</th><th>Jam selasai</th>
								<th>Sesi</th>
								<th>Mata Kuliah</th>
							
								<th>Instruktur</th>

								
							</tr>
	<?php $nomornya = 1;?>
	<?php while($data = mysql_fetch_array($kueri)){
		//echo 	"<td>".$barisnya[0]."</td>
		//		 <td>".$barisnya[2]."</td>
		//		 <td>".$barisnya[3]."</td>
		//		 <td>".$barisnya[4]." </td>
		//		 <td>".$barisnya[5]."</td>
		//		 <td>".$barisnya[6]."  Menit</td>
		//		 <td>".$barisnya[7]."</td>
		//		 <td>".$barisnya[8]."  Menit</td>
			//	 </tr><tr>";
	$tgl = $data['tanggal'];
	$harinya = date('D', strtotime($tgl));
$arai = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
$bulanya = date('m', strtotime($tgl));
$tahunya = date('Y' , strtotime($tgl));
$araibulan = array(
'01' => 'Januari',
'02' => 'Febrari','03' => 'Maret',
'04' => 'April','05' => 'Mei',
'06' => 'Juni','07' => 'Juli',
'08' => 'Agustus','09' => 'September',
'10' => 'Oktober','11' => 'November',
'12' => 'Desember'

);	
$tgl2 = date( 'd', strtotime($tgl));

			echo "	<tr>
								<td>".$nomornya."</td>
							
								
								
							
								<td>$arai[$harinya] , $tgl2 $araibulan[$bulanya] $tahunya</td>
								<td>".$data['jam_mulai']."</td>
								<td>".$data['jam_selesai']."</td>
								<td>".$data['sesi']."</td>
								<td>".$data['mata_kuliah']."</td>
		
								<td>".$data['instruktur']."</td>
								
							
								";?>
						
						</tr>
							<?php
		$nomornya++;
	}?></table><br><br><form action="exporjadwalkbmadmin.php">
<input type="submit" value="Cetak Ke Excel" target="blank">
</form>	<br><input class="noPrint" type="button" value="Cetak Ke PDF" onclick="window.print()"><br><br>
<?php
	
}?>		
                          
                  </div>
             </div>
      </div>
      
    
</div>



<?php break; ?>  

<?php }} ; ?>