<? session_start();?>
<script src="js/jquery-2.1.4.min.js"></script> 

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
 
<? include "koneksi.php";?>
		
		
		
 <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>



<!--climate start here-->
<div class="climate">
	<div class="col-md-10 climate-grids">
		<div class="climate-grid1">
			<div class="climate-gd1-top">
				<div class="col-md-6 climate-gd1top-left" > <div style="text-align:center;">
				<br><br><img style="width:70%;" src="img/logo2.png" >
<?php

$tgl = date('Y-m-d');
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
$tahunya = date('Y', strtotime($tgl));
$araibulan = array(
'01' => 'Januari',
'02' => 'Febrari','03' => 'Maret',
'04' => 'April','05' => 'Mei',
'06' => 'Juni','07' => 'Juli',
'08' => 'Agustus','09' => 'September',
'10' => 'Oktober','11' => 'November',
'12' => 'Desember'

);	
$tgl2 = date('d', strtotime($tgl));?>

					<h4><?php



$b = time();

$hour = date("G",$b);

if ($hour>=0 && $hour<=11)
{
$selamat="Selamat Pagi ";
echo $selamat;
}
elseif ($hour >=12 && $hour<=14)
{
$selamat="Selamat Siang ";
echo $selamat;
}
elseif ($hour >=15 && $hour<=17)
{
$selamat="Selamat Sore ";
echo $selamat;
}
elseif ($hour >=17 && $hour<=18)
{
$selamat="Selamat Petang ";
echo $selamat;
}
elseif ($hour >=19 && $hour<=23)
{
$selamat="Selamat Malam ";
echo $selamat;

}
 echo ucfirst($_SESSION[ps_nama]);
?>...  <br>Hari ini <?php echo "$arai[$harinya] , $tgl2 $araibulan[$bulanya] $tahunya";?></h4>
					<h3><span class="timein-pms">Jam</span><font color=yellow>
					
					
					<script>
function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
</script>

            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
			
			
			</font></h3>				
					<p>Semoga Harimu Menyenangkan...<br>
					<img src="https://i.pinimg.com/originals/87/51/83/87518377a9a0db0c319c52b25bd87634.png" width="50px">
					<?$sekarang=date("Y-m-d"); $sqpas = mysql_query("select * from kalender_pendidikan where tanggal_kegiatan > '$sekarang' order by tanggal_kegiatan asc limit 1");
					while ($tamp = mysql_fetch_array($sqpas)){ 
					if ($tamp['prediksi']=="YES"){$prediksi=" direncanakan ";}else{$prediksi="";}
					echo "<font color=yellow>Agenda terdekat berikutnya adalah kegiatan $tamp[nama_kegiatan] yang $prediksi akan dilaksanakan pada $tamp[tanggal_kegiatan]. Jadwal selengkapnya silakan <a href='index.php?page=kalenderpendidikan'>akses disini.</a> </font>";}?></p>
				</div>
				<div class="col-md-6 climate-gd1top-right">
					  <span class="clime-icon"> 
					  	<figure class="icons">
								<canvas id="partly-cloudy-day" width="64" height="64">
								</canvas>
							</figure>
						<script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "partly-cloudy-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>	
					
				   </span>					
					  <p>Jadwal pelajaran anda hari ini silakan klik <font color=yellow><a href="index.php?page=jadwal" class="btn btn-xs btn-success">disini</a></font></p>
					  
		
  
  
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="climate-gd1-bottom">
				<div style="color:white;padding-left:15px; padding-right:15px;">
						<h5>Pengumuman terbaru : </h5><?php  $b=0; $batasya = 4; $ara = mysql_query("select * from pengumuman order by tanggal desc limit 3");
						while($araa = mysql_fetch_array($ara)){ $b=$b+1; 
						echo $b.". ".$araa['isi_pengumuman']."<br><br>";}?>
<br><br><a href="index.php?page=pemberitahuan"> <font color=yellow>Lihat pengumuman lainnya..</font></a></h4>
						
						 
					</div>
					
					
					<!--
					<div class="col-md-4 cloudy1">
						<h4>UK</h4>
						<figure class="icons">
					<canvas id="cloudy" width="58" height="58"></canvas>
				</figure>					
					<script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "cloudy",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
						<h3>6c</h3>
					</div>
					<div class="col-md-4 cloudy1">
						<h4>USA</h4>
						<figure class="icons">
							<canvas id="snow" width="58" height="58">
							</canvas>
						</figure>
				        <script>
							 var icons = new Skycons({"color": "#fff"}),
								  list  = [
									"clear-night", "clear-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
						<h3>10c</h3>
					</div>
					
					-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	

<!--mainpage chit-chating-->
	
<div class="chit-chat-layer1" style="padding:10px;">
		<div class="climate-grid3" >
			<div class="popular-brand">
				<div class="col-md-6 popular-bran-left">
				<?$sqpas = mysql_query("select * from config_app_input_soal_ujian");
					while ($tamp = mysql_fetch_array($sqpas)){ 
						$ujianaktif=$tamp['ujian_aktif_ke'];
						$angkatanaktif=$tamp['angkatan_aktif'];
					}?>
                                  <h3 style="color:#333333;">Peringkat 10 Besar Nilai Ujian Online </h3>
								  Ujian Online Ke <? echo $ujianaktif;?><br>Angkatan <? echo $angkatanaktif;?>
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
							  
							  
							   <?php $bts = 10; $nomor=1;$sqlni = mysql_query("select * from nilai_akademik where materi like '%$ujianaktif%' and angkatan like '%$angkatanaktif%' order by nilai desc limit $bts"); while($tl = mysql_fetch_array($sqlni)) {
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
                      </table><br>Nilai selengkapnya  silakan <a href="index.php?page=nilaiujianonline">KLIK DISINI</a><br><br><br><br>
                  </div> 
             </div>
      </div>
      
 
</div>
<!--main page chit chating end here-->

<div class="col-md-4 climate-grids">

		<div class="climate-grid3">
			<div class="popular-brand">
				<div class="col-md-6 popular-bran-left">
				<h3>Berita Terbaru</h3>
				    <?php

getFeed("http://pspp-penerbangan.ac.id/feed");

function getFeed($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
       
    echo "<br>";
     
    foreach($x->channel->item as $entry) {
        echo "<a href='$entry->link' target='blank' title='$entry->title'>" . $entry->title . "</a><br>Date : ".$entry->pubDate."<br>". $entry->description . "... <br><br>";
    }
    echo "<br><br>";
}

?>
	<a href="http://pspp-penerbangan.ac.id" target="_blank">Berita selengkapnya silakan akses di <br>www.pspp-penerbangan.ac.id</a><br><br>
				</div>
			</div>
	</div>
	</div>

<? include "fotoselfie.php";?>




<div class="col-md-4 climate-grids" style="padding:10px;">
		<div class="climate-grid2">
			<span class="shoppy-rate"><h5><font color=white>Motivasi</font></h5></span>
			
		</div>
<br> <h3><i>Kata Motivasi</i></h3>
		<?php  $bts = 15; $aa = mysql_query("select * from motivasi where pub = 'true' order by id desc limit $bts  ");
		while ($tampilkan = mysql_fetch_array($aa)){?> <p class="button-heading"><i class="hvr-sweep-to-right"> # <?php echo $tampilkan['isi_teks'];?> Kiriman by :  <?php echo $tampilkan['dikirim_oleh'];?>  </i></p>
		
	<?}?>

		<i><font color=green>Temukan kiriman sejenis</font> <a href="?page=motivasi" class="hvr-icon-wobble-horizontal">Klik Disini</a></i><br><br><br>
</div>

	
	
	



<? if ($_SESSION[ps_nodaf]){?>
<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">
		<div class="col-md-6 chart-layer1-right"> 
			<div class="user-marorm">
			<div class="malorum-top">				
			</div>
			
			<div class="malorm-bottom">
				<span class="malorum-pro"> 	<?php 
												$sqlnama = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
												$arainama = mysql_fetch_array($sqlnama);
												$gambarnya="images/".$arainama['ps_foto'];
												echo "<img src=\"$gambarnya\" width='50px' height='50px'  alt=''>"?></span>
			     <h4>Biodata Diri</h4>
				 <h2><?php echo $arainama['ps_nama'];?></h2>
				<p><?php echo $arainama['ps_tglahir'];?><br>Prodi : <?php echo $arainama['ps_prodi'];?><br>PSPP <?php echo $arainama['ps_kampus'];?><br><br><? echo $arainama['ps_bio'];?></p>
				<ul class="malorum-icons">
					<li><a href="#"><i class="fa fa-facebook"> </i>
						<div class="tooltip"><span>Facebook</span></div>
					</a></li>
					<li><a href="#"><i class="fa fa-twitter"> </i>
						<div class="tooltip"><span>Twitter</span></div>
					</a></li>
					<li><a href="#"><i class="fa fa-google-plus"> </i>
						<div class="tooltip"><span>Google</span></div>
					</a></li>
				</ul>
			</div>
		   </div>
		</div>
	
  </div>
  
  <?}?>
  

 </div>
 
 