
 <?php session_start();

if (empty($_SESSION['ps_nodaf'])){
echo "<script>window.location='login.php'; </script>";
//echo "belum login";
 }
 else{
 include "koneksi.php";
?>
<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">

<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Nilai Ujian Online</h3>
    		  </div> 
			  
			   <div class="panel-body">
			  <?php $nodaf=$_SESSION['ps_nodaf']; $sqlnya = "select * from nilai_akademik where nodaf = '$nodaf'";
			  $kuer = mysql_query($sqlnya);
			  $hitung = mysql_num_rows($kuer);
			  $nomor = 1; 
			  if($hitung <=0 ){ } 
			  else { while ($tamp = mysql_fetch_array($kuer)){ ?>
    		  
    		  	  Nilai Ujian Online <?php echo $nomor;?> = <strong><?php echo $tamp['nilai'];?></strong><br>
  
			  <?php $nomor++; } ?>
			 
			
    		  	  <strong>RATA-RATA NILAI ANDA = <?php $hitu = mysql_query("select sum(nilai) as jumni from nilai_akademik where nodaf ='$nodaf'"); 
	$araijmlah = mysql_fetch_array($hitu);



	$dihitung = $araijmlah['jumni'] / $hitung  ;
	echo $dihitung; }
			 
	;?> </strong>
	<br><br>
Tampilkan Nilai Hasil Ujian Online Ke : 

<? $sqpas = mysql_query("select * from config_app_input_soal_ujian");
							while ($tamp = mysql_fetch_array($sqpas)){ 
								$ujianaktif=$tamp['ujian_aktif_ke'];
								$angkatanaktif=$tamp['angkatan_aktif'];
							}
?>


<form action="index.php?page=nilaiujianonline"  method="POST" >
	<select name="periode">
	<option value="1" <?PHP if ($_POST['periode']<>''){ if (@$_POST['periode']=="1"){ echo "selected=selected";}} else { if ($ujianaktif=="1") { echo "selected=selected";}} ?>>1</option>
	<option value="2" <?PHP if ($_POST['periode']<>''){ if (@$_POST['periode']=="2"){ echo "selected=selected";}} else { if ($ujianaktif=="2") { echo "selected=selected";}}?>>2</option>
	<option value="3" <?PHP if ($_POST['periode']<>''){ if (@$_POST['periode']=="3"){ echo "selected=selected";}} else { if ($ujianaktif=="3") { echo "selected=selected";}}?>>3</option>
	</select>
	<button type="submit" >Tampilkan</button>
	</form>
<br><br>

			  
			 
                            <div class="table-responsive">
							
							<?php  
							
							if ($_POST['periode'] <>'')
							{
								$filterperiode =" and materi like '%$_POST[periode]%' and angkatan like '%$angkatanaktif%' ";
							}
							else
							{
								$filterperiode = " and materi like '%$ujianaktif%' and angkatan like '%$angkatanaktif%' ";
							}
							

							
							$sqlni = mysql_query("select * from nilai_akademik where id <> 0 $filterperiode order by nilai desc");  ;?>
                                <table class="table table-hover" width="100%">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama</th>
									   <th>Nilai</th>
                                      <th>Jurusan</th>                                   
                                       <th>Kampus</th>                                 
                                     
                                      
                                  </tr>
                              </thead>
                              <tbody>
							  <?php $nomor=1;
							  while($tl = mysql_fetch_array($sqlni)) {
                               echo " <tr>
                                  <td>";?> 								  
								  <?php echo "".$nomor."</td>
                                  <td>".$tl['nama']."</td>
								  <td>";?> <span class='<?php 
								  if ($tl['nilai'] >= 80 && $tl['nilai'] <=100) { echo 'label label-success'; } ;
								  if ($tl['nilai'] >= 60 && $tl['nilai'] < 80) { echo 'label label-warning'; } ;
								  if ($tl['nilai'] >= 0 && $tl['nilai'] < 60) { echo 'label label-danger'; } ;?>'>  <?php echo "".$tl['nilai']."</span></td>
								  
                                  <td>".$tl['jurusan']."</td>                                 
                                  <td>".$tl['kampus']."</td>                    

                                 
                              </tr>";$nomor++;} ?>
							  
                             
                          </tbody>
                      </table>
					  </div>
                  </div>
             </div>
      </div>
      
    
</div>
<?php } ?>