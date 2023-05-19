
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <? session_start();if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp" >Kehadiran</h3><br>
				  Berikut data kehadiran anda yang terekam oleh mesin absensi fingerprint
    		  </div> 
                          
                           <div class="panel-body">
                                <table class="table table-hover" width="100%">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Tanggal</th>
                                      <th>Jam Datang</th>                                   
                                                                        
                                      <th>Jam Pulang</th>
                                      <th>Keterangan</th>
                                  </tr>
                              </thead>
                              <tbody>
							  <?php $nomor = 1; $sql = mysql_query ("select * from absensi where id_user = '$_SESSION[ps_nama]' order by tanggal desc");
							  while ($tampilkan = mysql_fetch_array($sql)){
							 
                               echo " <tr>
                                  <td>".$nomor."</td>
                                  <td>".$tampilkan['tanggal']."</td>
                                  <td>".$tampilkan['jam_masuk']."</td>                                 
                                   <td>".$tampilkan['jam_keluar']."</td>                        
                                  <td>".$tampilkan['keterangan']."</td>
                                  
                              </tr>"; $nomor++;
							}?>
                              
                          </tbody>
                      </table></div> </div></div></div><? } ?>