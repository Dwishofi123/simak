<?php  session_start();
$aidi=$_SESSION[id_login];
include "system/konek.php";

$thisAgent  = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];
WebsiteGuard();
function WebsiteGuard(){
    global $thisAgent;
    $isDenied = false;
    if (preg_match("/webzip|httrack|wget|FlickBot|downloader|production
    bot|superbot|PersonaPilot|NPBot|WebCopier|vayala|imagefetch|
    Microsoft URL Control|mac finder|
    emailreaper|emailsiphon|emailwolf|emailmagnet|emailsweeper|
    Indy Library|FrontPage|cherry picker|WebCopier|netzip|
    Share Program|TurnitinBot|full web bot|zeus/i",$thisAgent)){
        $isDenied = true;
        print "Fuck u!!!<br><br><br>Regards : Admin BIFA Penerbangan ( ./d1y4n_attacker.htm )";
        exit();
    }
}


 if($_SESSION[status_login]<>"true"){?>
 <script type="text/JavaScript">
setTimeout(function () {
   window.location.href = "login.php"; //will redirect to your blog page (an ex: blog.html)
}, 1); //will call the function after 1 secs.
</script>
<? }?>



<!DOCTYPE html> <html lang=en> 
<head>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">

<link href='img/app.ico' rel='icon' type='image/x-icon'/>
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">

<!-- PreLoad Wait - Script -->
<!-- This script and more from http://www.rainbow.arch.scriptmania.com 

function waitPreloadPage() { //DOM
if (document.getElementById){
document.getElementById('prepage').style.visibility='hidden';
}else{
if (document.layers){ //NS4
document.prepage.visibility = 'hidden';
}
else { //IE4
document.all.prepage.style.visibility = 'hidden';
document.getElementById("loading_bars").click();
}
}
}
// End -->

</SCRIPT>



<title>BIFA Integrated - BackPanel  </title> 
<link rel=icon type=image/ico href="favicon.html"/> 
<link href=css/stylesheets.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=js/plugins/jquery/jquery.min.js></script>
<script type=text/javascript src=js/plugins/jquery/jquery-ui.min.js></script> 
<script type=text/javascript src=js/plugins/jquery/jquery-migrate.min.js></script> 
<script type=text/javascript src=js/plugins/jquery/globalize.js></script> 
<script type=text/javascript src=js/plugins/bootstrap/bootstrap.min.js></script> 
<script type=text/javascript src=js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js></script> 
<script type=text/javascript src=js/plugins/uniform/jquery.uniform.min.js></script> 
<script type=text/javascript src=js/plugins/knob/jquery.knob.js></script> 
<script type=text/javascript src=js/plugins/sparkline/jquery.sparkline.min.js></script> 
<script type=text/javascript src=js/plugins/flot/jquery.flot.js></script> 
<script type=text/javascript src=js/plugins/flot/jquery.flot.resize.js></script>
 <script type=text/javascript src=js/js.js></script> 
 <script type=text/javascript src=js/settings.js></script>
 <script type=text/javascript src=js/jquery.colorbox.js></script>
 <script type=text/javascript src=js/plugins/datatables/jquery.dataTables.min.js></script> 
  <script type=text/javascript src=js/plugins/select2/select2.min.js></script>
  <script type=text/javascript src=js/plugins/tagsinput/jquery.tagsinput.min.js></script> 
  <script type=text/javascript src=js/plugins/jquery/jquery-ui-timepicker-addon.js></script> 
  <script type=text/javascript src=js/plugins/ibutton/jquery.ibutton.js></script>
<link href=css/colorbox.css rel=stylesheet type=text/css />
 </head> 
 
 
 <body class=bg-img-num1 onLoad="waitPreloadPage();">
 <div class=statusbar id=loading_bars style="z-index:1000;"> <div class=statusbar-icon><img src="img/loader.gif"/></div> <div class=statusbar-text>Loading...</div> <div class="statusbar-close icon-remove"></div> </div> 

 
 
 <DIV id="prepage" style="position:fixed;  left:0px; top:0px; background-color:white; layer-background-color:white; height:100%; width:100%; z-index:1000; text-align:center;"> 
<br><br><br><br><br><TABLE width=100%><TR><TD><B><font color=white>Loading ... ... Please wait!<br><br><img src="img/loading.gif"/></font></B></TD></TR></TABLE>
</DIV>



 <div class=container>
 <div class=row> 
 <div class=col-md-12>
 <nav class="navbar brb" role=navigation> 
 <div class=navbar-header> 
 <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-ex1-collapse> 
 <span class=sr-only>Toggle navigation</span>
 <span class=icon-reorder></span> </button> 
 <a class=navbar-brand href=index.php>
 <i><font color="#d31583"> BIFA</font></i><img src="img/esids.png"/></a> 
 </div> 
 
 <div class="collapse navbar-collapse navbar-ex1-collapse"> 
 <ul class="nav navbar-nav"> 
 <li class="active  tipb" data-original-title="Digunakan untuk mengakses data RECENT UPDATE"> <a href=#dashboard onClick="getPage(1);"> <span class="icon-home"></span> dashboard </a> </li> 
 
 
  
   
   <li class="dropdown"> 
	 <a href=# class="dropdown-toggle" data-toggle=dropdown><span class="icon-user"></span> PSB</a>
	 <ul class=dropdown-menu> <? if ($_SESSION[user_marketing]=="bukan"){?>
	 
	
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><li><a href="#setting_psb" onClick='getPage(2)'>Setting PSB</a></li> <?}else{?><li><li><a href="#setting_psb" > <font color="grey">Setting PSB</font></a></li><?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#siswa_mendaftar" onClick='getPage(3)'>Data Siswa Mendaftar Online</a></li> <?}else{?><li><a href="#siswa_mendaftar" ><font color="grey">Data Siswa Mendaftar Online</font></a></li><?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#migrasi_siswa" onClick='getPage(19)'>Migrasi Data Siswa Antar Marketing</a></li><?}else{?><li><a href="#migrasi_siswa" ><font color="grey">Migrasi Data Siswa Antar Marketing</font></a></li><?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#validasi_pendaftaran" onClick='getPage(5)'>Validasi Biaya Pendaftaran</a></li> <?}?>
	  <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#validasi_pendaftaran" onClick='getPage(5)'>Data Siswa Sudah Membayar Biaya Pendaftaran</a></li> <?}else{?><li><a href="#siswa_mendaftar" ><font color="grey">Data Siswa Sudah Membayar Biaya Pendaftaran</font></a></li><?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#seleksi_penerimaan" onClick='getPage(6)'>Seleksi, Interview & Upload Surat Kelulusan</a></li>   <?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#daftar_ulang" onClick='getPage(7)'>Input Daftar Ulang</a></li> <?}else{?><li><a href="#daftar_ulang" ><font color="grey">Input Daftar Ulang</font></a></li> <?}?>
	 <? if ($_SESSION[hak_akses_public]=="true"){?><li><a href="#data_surat_kelulusan" onClick='getPage(20)'>Cetak Surat Pengumuman Tes Seleksi</a></li><?}?>
	 
	 
	 <?php  if (@$_SESSION['hak_akses_public']=="true")   {  ?><li><a href="#data_interview" onClick='getPage(42)'>Input Interview</a></li> <?php  } else if (@$_SESSION['input_interview'] == "true") { ?><li><a href="#data_interview" onClick='getPage(42)'>Input Interview</a></li><?php } else {	?><li><li><a href="#data_interview" > <font color="grey">Input Interview</font></a></li><?php } ?>
	 
	 
	 <?}
	 
	?>
	 
	 </ul>
   </li> 
   
  

	 
   <li class=dropdown> 
	 <a href=# class=dropdown-toggle data-toggle=dropdown><span class="icon-th-list"></span> Akademik</a>
	 <ul class=dropdown-menu> <? if ($_SESSION[user_marketing]=="bukan"){?>
	 <li><a href="#setting_akademik"><font color="grey"  onClick='getPage(2)'>Setting Akademik</font></a></li>
	 <? if ($_SESSION[hak_akses_data_siswa]=="true"){?><li><a href="#data_siswa"  onClick='getPage(31)'>Data Siswa</a></li> <?}else{?><li><a href="#data_siswa"><font color="grey">Data Siswa</font></a></li> <?}?>
	<li><a href="#perlengkapan"><font color="grey">Data Perlengkapan Siswa</font></a></li>  
	  <? if ($_SESSION[sms]=="true"){?><li><a href="#pengumuman" onClick=BoxSMS(2) ><font color="white">Pengumuman Siswa</font></a></li> <?}else{?><li><a href="#pengumuman"><font color="grey">Pengumuman Siswa</font></a></li><?}?>
	 <li><a href="#jadwal"><font color="grey">Jadwal Belajar</font></a></li> 
	 <li ><a href=# data-toggle=dropdown>Laporan Absensi</a>
			 <ul class=dropdown-submenu> 
			   <li><a href="#absensi_pegawai" onClick='getPage(25)'>Absensi Pegawai</a></li> 
			   <li><a href="#absensi_pegawai" onClick='getPage(32)'>Absensi Instruktur</a></li> 
			   <li><a href="#absensi_siswa" onClick='getPage(38)'>Absensi Siswa</a></li>
			 </ul>
	</li> 
	
	<? if ($_SESSION[hak_akses_data_siswa]=="true"){?><li><a href="#nilai" onClick='getPage(30)'><font color="white">Nilai Ujian Bulanan</font></a></li> <?}else{?>
	<li><a href="#nilai"><font color="grey">Nilai Ujian Bulanan</font></a></li> <?}?>
	
	<?}?>
	 </ul>
   </li>  
   
<li class=dropdown> 
	 <a href=# class=dropdown-toggle data-toggle=dropdown><span class="icon-usd"></span> Keuangan</a>
	 <ul class=dropdown-menu> <? if ($_SESSION[user_marketing]=="bukan"){?>
	 <li><a href="#biaya_tambahan"><font color="grey">Input Biaya Tambahan</font></a></li> 
	<? if ($_SESSION[hak_akses_bayar_angsuran_siswa]=="true"){?> <li><a href="#bayar_angsuran_siswa"  onClick='getPage(16)'>Pembayaran Angsuran Siswa</a></li><?}else{?><li><a href="#bayar_angsuran_siswa"><font color="grey">Pembayaran Angsuran Siswa</font></a></li><?}?>
	
	<? if ($_SESSION[hak_akses_bayar_angsuran_siswa]=="true"){?> <li><a href="#android_konfirmasi_pembayaran"  onClick='getPage(39)'><font color="yellow">ANDROID - Konfirmasi Pembayaran</font></a></li><?}else{?><li><a href="#android_konfirmasi_pembayaran"><font color="grey">ANDROID - Konfirmasi Pembayaran</font></a></li><?}?>
	
	
	   <? if ($_SESSION[hak_akses_input_kasbon]=="true"){?><li><a href="#kasbon" onClick='getPage(17)'>Input Kasbon Karyawan</a></li>  <?}else{?> <li><a href="#kasbon"><font color="grey">Input Kasbon Karyawan</font></a></li> <?}?>
	 <li><a href="#anggaran"><font color="grey">Pengajuan Anggaran</font></a></li>
	 
	 <? if ($_SESSION[hak_akses_laporan_keuangan]=="true"){?><li><a href="#laporan_keuangan"  onClick='getPage(34)' class=dropdown-toggle data-toggle=dropdown><font color="white">Accounting</font></a>
		  <ul class=dropdown-submenu>
		   <li><a href="#anggaran"><font color="grey">Setup</font></a></li>
		   
		 <li><a href="#anggaran"  onClick='getPage(34)' class=dropdown-toggle data-toggle=dropdown><font color="white">Transaksi</font></a>
			 <ul class=dropdown-submenu>
			 <!--
			<li><a href="#kas_masuk" onClick='getPage(35)'><font color="white">Kas Masuk</font></a></li>
			<li><a href="#kas_keluar" onClick='getPage(34)'><font color="white">Kas Keluar</font></a></li>
			<li><a href="#jurnal_umum"><font color="grey">Jurnal Umum</font></a></li>
			<li><a href="#laporan_keuangan" onClick='AccLaporanMingguan(1)'><font color="white">Laporan Mingguan</font></a></li>-->
				<li><a href="#kas_masuk"><font color="grey">Kas Masuk</font></a></li>
			<li><a href="#kas_keluar" ><font color="grey">Kas Keluar</font></a></li>
			<li><a href="#jurnal_umum"><font color="grey">Jurnal Umum</font></a></li>
			<li><a href="#laporan_keuangan" ><font color="grey">Laporan Mingguan</font></a></li>
			</ul>
		</li>
		 
		 <li><a href="#anggaran" onClick='LaporanBukuJurnal(1)' class=dropdown-toggle data-toggle=dropdown><font color="white">Laporan Accounting</font></a>
			 <ul class=dropdown-submenu>
			   <li><a href="#anggaran" ><font color="grey">Buku Jurnal</font></a></li>
			   <li><a href="#anggaran"><font color="grey">Neraca Percobaan</font></a></li>
			   <li><a href="#anggaran"><font color="grey">Hitung SHU</font></a></li>
			   <li><a href="#anggaran"><font color="grey">Rugi Laba</font></a></li>
			   <li><a href="#anggaran"><font color="grey">Neraca</font></a></li>			   
			 </ul>
		 </li>
		
		 </ul>
	 </li> <?}else{?><li><a href="#laporan_keuangan" class=dropdown-toggle data-toggle=dropdown><font color="grey">Accounting</font></a></li> <?}?>
	 <?}?>
	 </ul>
   </li>   
 
 
 
 
  <? if ($_SESSION[hak_akses_public]=="true"){?>
    <li class=dropdown> 
	 <a href=# class=dropdown-toggle data-toggle=dropdown> <span class="icon-star"></span> Pasca </a> 
	 <ul class=dropdown-menu> 
	 <!--<li><a href="#" onClick='getPage(40)' data-title="Website Utama BIFA Penerbangan"  class="modal-ajax">Grade Penilaian</a></li> 
	 <li><a href="#" onClick='getPage(41)' data-title="Website Utama BIFA Penerbangan"  class="modal-ajax">Siswa Bekerja</a></li> 
	 -->
	 	 <li><a href="#" data-title="Website Utama BIFA Penerbangan"  class="modal-ajax"><font color="grey">Grade Penilaian</font></a></li> 
	 <li><a href="#" data-title="Website Utama BIFA Penerbangan"  class="modal-ajax"><font color="grey">Siswa Bekerja</font></a></li> 
	 </ul>
	 </li>
	  <?}?>
	 
	 
      <li class=dropdown> 
	 <a href=# class=dropdown-toggle data-toggle=dropdown> <span class="icon-envelope"></span> Website & SMS </a> 
	 <ul class=dropdown-menu> 
	 <li><a href="#" data-title="Website Utama BIFA Penerbangan"  class="modal-ajax">Website Utama</a>
	 <ul class=dropdown-submenu> 
	 	   <li><a href="#berita" onClick='getPage(13)'>Tulis Berita</a></li> 
		   <li><a href="#publlish"><font color="grey">Publish Siswa Bekerja</font></a></li> 
	  </ul>
	 </li> 

	 
 <li>
	 <a href=#modal_allert data-toggle=modal><? if ($_SESSION[user_marketing]=="ya"){?><font color="grey">SMS</font><?} else {?>SMS<?}?></a>
	  <ul class=dropdown-submenu> 
	  
	    <? if ($_SESSION[sms]=="true"){?><li><a href="#kirim_sms" onClick=BoxSMS(1) >Kirim Pesan ke Nomor  </a></li>  <?}else{?><li><a href="#kirim_sms" > <font color="grey">Kirim Pesan ke Nomor  </font></a></li> <?}?>
		
	   <? if ($_SESSION[sms]=="true"){?><li><a href="#kirim_sms" onClick=BoxSMS(2) >Kirim Pesan ke Kelas  </a></li> <?}else{?> <li><a href="#kirim_sms"><font color="grey">Kirim Pesan ke Kelas  </font></a></li><?}?>
	   
	   <? if ($_SESSION[sms]=="true"){?><li><a href="#kirim_sms" onClick=BoxSMS(3) >Kirim Pesan ke Ortu  </a></li> <?}else{?><li><a href="#kirim_sms"><font color="grey">Kirim Pesan ke Ortu  </font></a></li> <?}?>
	   
	   <? if ($_SESSION[sms]=="true"){?><li><a href="#kirim_sms" onClick=BoxSMS(4) >Kirim Pesan ke Karyawan  </a></li> <?}else{?><li><a href="#kirim_sms"><font color="grey">Kirim Pesan ke Karyawan  </font></a></li> <?}?>
	  
	  </ul>
	 </li> 
	 
	 </ul>
	 
	 
	  <li class="dropdown"> 
	 <a href=# class="dropdown-toggle  tipb" data-original-title="Menu Khusus Untuk Marketing" data-toggle=dropdown><span class="icon-th-list"></span>Marketing</a>
	 <ul class=dropdown-menu> 
	<li><a href="private/prosedur_pemasaran_online.html" target="_blank"><font color="yellow">Prosedur Pemasaran Online</font></a></li>
	 <li><a href="#list_domain" onClick='getPage(10)'>Blog / Website Promosi</a></li>
	 <li><a href="#downloaddesain" onClick='getPage(36)'><font color="yellow">Download Desain Promosi</font></a></li> 		 
	 <li><a href="#siswa_daftar_ulang" onClick='getPage(29)'>Wilayah Presentasi Marketing</a></li>
	 <li><a href="#siswa_daftar" onClick='getPage(11)'>Data Siswa Mendaftar Online</a></li> 
	 <li><a href="#siswa_daftar_ulang" onClick='getPage(12)'>Data Siswa Sudah Daftar Ulang</a></li>
	 <li><a href="#siswa_daftar_ulang" onClick='getPage(18)'>Data Kasbon Anda</a></li>
     <li><a href="#berita" onClick='getPage(13)'>Tulis Berita</a></li>	
	 
 
	 </ul>
   </li>  
   
   
	  <li  class="tipb" data-original-title="Sampaikan Kritik dan Saran"> <a href="#kritiksaran" <? if ($_SESSION[kritikdansaran]=="true"){?> onClick='getPage(37)'<?} else{?> onClick='getPage(15)'<?}?>><span class="icon-star"></span> Kritik & Saran </a> </li> 
	  <li class="tipb" data-original-title="Tentang E-SIDS Online"><a href="#about" onClick='getPage(14)'><span class="icon-comments-alt"></span>About </a> </li> 
   </li>  


 
 
 

 </ul> 
 </div>
 </nav> 
 </div> 
 </div> 
 
 
 
 
 
   <!-- MODAL KONFIRM LOGOUT -->
 <div class="modal modal-draggable modal-white" id=konfirm_logout tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title>KONFIRMASI LOGOUT | ANDA YAKIN?</h4> </div> &nbsp; &nbsp; &nbsp; <img src="img/im-outta-here-bye-bye-smiley-emoticon.gif"><div class=modal-footer> <a href="system/logout.php"><button type=button class="btn btn-success btn-clean" >Yes</button></a> <button type=button class="btn btn-danger btn-clean" data-dismiss=modal>No</button> </div> </div> </div> </div>   
	<!-- AKHIR MODAL KONFIRM LOGOUT -->
  
  <!-- MODAL TOLAK HAK AKSES -->
 <div class="modal modal-draggable modal-success" id=modal_allert tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true> <div class=modal-dialog> 
 <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> <h4 class="modal-title">Uupss....! </h4>Anda tidak mempunyai hak akses untuk ini. Silakan hubungi administrator!</div><div class="modal-footer"> <button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button> </div> </div>
 </div> </div> <!-- AKHIR MODAL TOLAK HAK AKSES -->
 
 
 
 
 
  <!--  <div class=scroll id=layout_scroll> -->
 
 
 <div class=row> 
 <div class=col-md-2> 
 <div class="block block-drop-shadow"> 
 <div class="user bg-default bg-light-rtl"> 
 <? $query6 = mysql_query("select count(id) from progres_kerja where user='$aidi' and deadline='selesai'"); while($x=mysql_fetch_row($query6)) { $selesai=$x[0];}?>
<? $query6 = mysql_query("select count(id) from progres_kerja where user='$aidi' and deadline='menunggu'"); while($x=mysql_fetch_row($query6)) { $menunggu=$x[0];} $jumlah_kerjaan=$selesai+$menunggu; ?>	
 <? $query6 = mysql_query("select count(id) from private_message where tujuan='$aidi'  and status_read='NO'"); while($x=mysql_fetch_row($query6)) { if($x[0]>0){$pesan_belum_dibaca=$x[0];}else{$pesan_belum_dibaca="0";}}?>
<? $query6 = mysql_query("select count(id) from private_message where tujuan='$aidi' and status_read='Yes'"); while($x=mysql_fetch_row($query6)) { $pesan_sudah_dibaca=$x[0];}  ?>	
<? $query6 = mysql_query("select count(id) from private_message where dari='$aidi'"); while($x=mysql_fetch_row($query6)) { $pesan_terkirim=$x[0];}  ?>	

 <div class=info> <a href="#private_message" <? echo " onClick='getPage(10)'";?>class="informer informer-three tipb"  data-original-title=" &nbsp; Anda mempunyai <? echo $pesan_sudah_dibaca;?> pesan masuk dan <? echo $pesan_terkirim;?> pesan keluar."> <span> <? echo $pesan_sudah_dibaca;?> / <? echo $pesan_terkirim;?></span> Pesan  </a> 
 <a href="#progress_kerja" <? echo " onClick='getPage(15)'";?>class="informer informer-four"> <span><? echo $menunggu;?> / <? echo $selesai;?> </span> Progress Job </a> 
 <a href='system/view_profile.php?id=<? echo $_SESSION[id_login];?>' data-title='Profile Detail'  class='modal-ajax'>
 <img src="img/user/thumb_<? echo $_SESSION[id_login];?>.jpg" class="img-circle img-thumbnail"/> </a>
 </div> 
 </div>
 <div class="content list-group list-group-icons">
 <a href=#main <? echo " onClick='getPage(0)'";?>class="list-group-item tipr" data-original-title="Digunakan untuk mengakses biodata diri"><span class=icon-envelope></span>Biodata Diri  <i class="icon-angle-right pull-right"> <? $query = mysql_query("select count(id) from private_message where tujuan='22' and status_read='NO'"); while($b=mysql_fetch_row($query)) { if ($b[0] >0) {echo "<span class='label label-warning pull-right'>".$b[0]."</span>"; }}?></i></a>
<!-- <a href=# class=list-group-item><span class=icon-bar-chart></span>Statistik<i class="icon-angle-right pull-right"></i></a> -->
 <a href=#config <? echo " onClick='getPage(4)'";?>class="list-group-item tipr" data-original-title="Digunakan untuk mengganti gambar profil dan mengganti password user"><span class=icon-cogs></span>Pengaturan<i class="icon-angle-right pull-right"></i></a> 
 <? if ($_SESSION[id_login]=="22" or $_SESSION[id_login]=="6" or $_SESSION[id_login]=="7" or $_SESSION[id_login]=="84"){ if ($_SESSION[hak_akses_public]=="true"){?><a href=#log <? echo " onClick='getPage(22)'";?>class="list-group-item tipr" data-original-title="Berisi semua jejak aksi user dalam pemanfaatan aplikasi, baik hapus data, insert data dan lain sebagainya"><span class=icon-user></span>Log Info<i class="icon-angle-right pull-right"></i></a> <?}}?>
 <a href=#help_desk <? echo " onClick='getPage(23)'";?>class="list-group-item tipr" data-original-title="Berisi tentang video petunjuk penggunaan aplikasi"><span class=icon-info></span>Bantuan<i class="icon-angle-right pull-right"></i></a> 
 
<a href="private/prosedur_pemasaran_online.html" target="_blank" class="list-group-item tipr" data-original-title="Berisi tentang prosedur-prosedur pemasaran online"><span class=icon-fire></span><font color="yellow">Prosedur Pemasaran</font></a>
  <a href=#konfirm_logout data-toggle=modal class="list-group-item tipr" data-original-title="Keluar"><span class=icon-off></span>Keluar<i class="icon-angle-right pull-right"></i></a> 
 </div>
 </div>

  <div class="block block-drop-shadow"> 
 <div class="head bg-dot20"> <h2>Jumlah Pendaftar</h2>
 <div class="side pull-right"> 
 <ul class=buttons> 
 <li><a href="" class="tip"  data-original-title="Klik Untuk Me-refresh Quota"><span class="icon-refresh"></span></a></li>
 </ul> </div> <div class=head-subtitle>Pendidikan Kelas <? $psb_aktif=$_SESSION['psb.aktif'];   $explode_psb_aktif=  explode("(",$psb_aktif); echo $explode_psb_aktif[1];?></div>
 <div class="head-panel nm tac"> 
 <? $query6 = mysql_query("select count(id) from siswa where tempat_kuliah='BIFA Lampung'    and validasi_pendaftaran='Belum Divalidasi'  and jurusan like '%$explode_psb_aktif[1]' "); while($x=mysql_fetch_row($query6)) { $lampung=$x[0];}?>
  <? $query6 = mysql_query("select count(id) from siswa where tempat_kuliah='BIFA Yogyakarta' and validasi_pendaftaran='Belum Divalidasi'  and jurusan like '%$explode_psb_aktif[1]' "); while($x=mysql_fetch_row($query6)) { $jogja=$x[0];}?>
   <? $query6 = mysql_query("select count(id) from siswa where tempat_kuliah='BIFA Jakarta' and validasi_pendaftaran='Belum Divalidasi' and jurusan like '%$explode_psb_aktif[1]' "); while($x=mysql_fetch_row($query6)) { $jakarta=$x[0];}?>
    <? $query6 = mysql_query("select count(id) from siswa where tempat_kuliah='BIFA Makassar' and validasi_pendaftaran='Belum Divalidasi' and jurusan like '%$explode_psb_aktif[1]' "); while($x=mysql_fetch_row($query6)) { $makassar=$x[0];}?>
 <div class=sparkline> <span sparkType=pie sparkWidth=100 sparkHeight=100><? echo $lampung;?>,<? echo $jakarta;?>,<? echo $jogja;?>, <? echo $makassar;?></span> </div>
 </div> 
 <div class="head-panel nm"> 
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main><span class=icon-circle></span> BIFA Lampung [<? echo $lampung;?>]</span> </div>
  <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main><span class="icon-circle text-primary"></span> BIFA Jakarta [<? echo $jakarta;?>]</span> </div> 
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main><span class="icon-circle text-info"></span> BIFA Jogja [<? echo $jogja;?>]</span> </div>
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main><span class="icon-circle text-info"></span> BIFA Makassar [<? echo $makassar;?>]</span> </div>

 </div>
 </div> 
 </div>
 
 
 
  <div class="block block-drop-shadow"> <div class="head bg-dot20"> <h2>Progres Kerja</h2> 
 <div class="side pull-right"> 
 <ul class=buttons>
 <li><a href="#progress_kerja&option=menunggu" <? echo " onClick='getPage(15)'";?>class="tip"  data-original-title="Klik untuk melihat data progres kerja anda"><span class=icon-play></span></a></li>
 </ul> 
 </div> 

 <div class="head-panel nm tac" style="line-height: 0px;">
 <div class=knob> <input type=text data-fgColor=#3F97FE data-min=0 data-max=<? echo $jumlah_kerjaan;?> data-width=100 data-height=100 value=<? echo $selesai;?> data-readOnly="true"/> 
 </div> 
 </div>
 <div class="head-panel nm"> 
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main>Progress Pekerjan anda <? echo floor(($selesai/$jumlah_kerjaan)*100);?>%</span>
 <span class=hp-sm>Pekerjaan selesai : <? echo $selesai;?> </span>
 <span class=hp-sm>Pekerjaan menunggu : <? echo $menunggu;?> </span>
 </div>
 <a href="#progress_kerja&option=menunggu" <? echo " onClick='getPage(15)'";?>><button data-original-title="Klik untuk memperbarui progress pekerjaan anda saat ini." class="btn btn-info tipr" title=""> &nbsp;Kelola Progress</button></a>
   <a href="#progress_kerja&option=selesai" <? echo " onClick='getPage(15)'";?>><button data-original-title="Klik untuk megakses laporan kerja." class="btn btn-success tipr" title=""> &nbsp; Laporan Kerja! &nbsp;  </button></a>

 </div> 
 </div> 
 </div> 
 
 
 
 <div class="block block-drop-shadow">
 <div class="head bg-dot20"> <h2>CPU <? echo gethostbyaddr($_SERVER['REMOTE_ADDR']);?></h2> 
 <div class="side pull-right"> 
 <ul class=buttons>
 <li><a href=#><span class=icon-cogs></span></a></li>
 </ul> 
 </div>
 <div class=head-subtitle>Intel Core2 Duo T6670 2.20GHz <br>IP : <? echo $_SERVER['REMOTE_ADDR'];?></div>
 <div class="head-panel nm">
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main>Core 0 <span class=icon-angle-right></span> 89%</span> 
 <div class=hp-sm> 
 <div class="progress progress-small"> 
 <div class="progress-bar progress-bar-danger" role=progressbar aria-valuenow=89 aria-valuemin=0 aria-valuemax=100 style="width: 89%"></div>
 </div>
 </div>
 </div>
 <div class="hp-info hp-simple pull-left hp-inline"> <span class=hp-main>Core 1 <span class=icon-angle-right></span> 56%</span> 
 <div class=hp-sm>
 <div class="progress progress-small">
 <div class="progress-bar progress-bar-warning" role=progressbar aria-valuenow=56 aria-valuemin=0 aria-valuemax=100 style="width: 56%">
 </div> 
 </div>
 </div> 
 </div> 
 </div> 
 </div> 
 </div> 
 
 
 


 </div> 
 



 <script type="text/javascript">
function getPage(id) {
	$('#output').html("<img src='img/loading2.gif'/><font color=white>Loading... Mohon tunggu..</font>");
	jQuery.ajax({
		url: "get_page.php",
		data:'id='+id,
		type: "POST",
		success:function(data){$('#output').html(data);}
	});
}
getPage(1);

function getQuota(id) {
	$('#quota').html("<img src='img/loading2.gif'/><font color=white>Loading... Mohon tunggu..</font>");
	jQuery.ajax({
		url: "system/get_quota.php",
		data:'id='+id,
		type: "POST",
		success:function(data){$('#quota').html(data);}
	});
}
getQuota(1);


function BoxSMS(id){
        $.colorbox({iframe:true, width:"50%", height:"96%", href: "system/sms.php?id="+id});
}

function LaporanBukuJurnal(id){
        $.colorbox({iframe:true, width:"90%", height:"90%", href: "system/acc_buku_jurnal.php?id="+id});
}
function AccLaporanMingguan(id){
        $.colorbox({iframe:true, width:"90%", height:"90%", href: "system/acc_laporan_mingguan.php?id="+id});
}
</script>

 


<!-- KONTEN -->
<div id="output"><img src='img/loading2.gif'/><font color=white>Loading... Mohon tunggu..</font></div>
 <!-- / konten-->
 


 

 
 <div class=row> <div class=page-footer> <div class=page-footer-wrap>
 <div class="side pull-left"> Copyright &COPY; BIFA Integrated System 2015. All rights reserved. </div> </div> </div>
 </div>
 
  </div> 
 
 <!-- no scrool </div> -->
 



 </body> 

</html>