<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>

<?php include "koneksi.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<style>
 
	
	table th {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #FFA6A6;
		background-color: #D56A6A;
		color: #ffffff;
	}
	
	table tr:nth-child(even) td{
		background-color: #F7CFCF;
	}
	table td {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #FFA6A6;
		background-color: #ffffff;
	}
	
	</style>

	
<div class="chit-chat-layer1" style="padding:10px;">
		<div class="climate-grid3" >
			<div class="popular-brand">
				<div class="col-md-6 popular-bran-left">
				
				<? $sqlni=mysql_query("select * from nilai_tes_seleksi_kelas_khusus where nodaf='$_SESSION[ps_nodaf]'"); 
				$c=0;
				while($data = mysql_fetch_array($sqlni)) { $c=$c+1; $pesan="Anda sudah mengikuti tes seleksi kelas khusus. Berikut hasil tes seleksi anda :<br><br>Tanggal tes : $data[tanggal_tes]<br>Nilai $data[ket_nilai]";}
				
				if ($c==1) { echo $pesan;}?>
				
                                  <h3 style="color:#333333;">Peringkat Tes Seleksi Kelas Khusus</h3>
                            </div>
                            <div class="table-responsive" width="100%">
                                <table >
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Jurusan</th>                                   
                                       <th>Kampus</th>                                 
                                      <th>Nilai</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
							   <?php  $nomor=1;$sqlni = mysql_query("select * from nilai_tes_seleksi_kelas_khusus order by nilai desc"); while($tl = mysql_fetch_array($sqlni)) {
                                echo "<tr>
                                  <td>";?><?php echo $nomor;?><?php echo "</td>
                                  <td>".$tl['nama']."</td>
                                  <td>".$tl['jurusan']."</td>                                 
                                  <td>".$tl['kampus']."</td>                    
                                  <td>";?> <span class='<?php if ($tl['nilai'] >= 8 && $tl['nilai'] <=10) {echo 'label label-success';} ;
								  if ($tl['nilai'] >= 6 && $tl['nilai'] <8) {echo 'label label-warning';} ;
								  if ($tl['nilai'] >= 0 && $tl['nilai'] <6) {echo 'label label-danger';};?>'><?php echo "$tl[nilai]";?></span><?php echo "</td>
                                 
                              </tr>";
							  $nomor++; }?>
                             
							
                          </tbody>
                      </table><br><br><br>
                  </div> 
             </div>
      </div>
      
 
</div>

			
			  
    	</div>