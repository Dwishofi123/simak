<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "../login.php"; }, 1); </script><? }?><? include "pikachu.php";?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>
<? if ($_POST[cari_tanggal_1]=="") {$tanggal=date("Y-m-d");} else{ $tanggal=$_POST[cari_tanggal_1]." and ". $_POST[cari_tanggal_2];}?>

<link href=../css/colorbox.css rel=stylesheet type=text/css />
<script type="text/javascript">
function PrintDiv2() {    
           var divToPrint2 = document.getElementById('divToPrint2');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint2.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
<script type="text/javascript">
$(document).ready(function() {
 $("#export_33").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint2').html()));     
 });
}); 
</script>
<script type="text/javascript">
$(document).ready(function() {
 $("#export_4").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint2').html()));     
 });
}); 
</script>

<div class="modal modal-draggable modal-white" id=modal_default_1 tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title>Petunjuk Penggunaan</h4> </div> <div class="modal-body clearfix"> <p> &nbsp; no koment...</p> </div> <div class=modal-footer> <button type=button class="btn btn-warning btn-clean" data-dismiss=modal>Close</button> </div> </div> </div> </div>
						
 
 
 
  
 <!-- FORM CARI ABSENSI -->
<div class="modal modal-draggable modal_default_1" id=cari_anggaran tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true>
 <div class=modal-dialog> 
 <div class=modal-content>
 <form action="" method="post">
 <div class=modal-header> 
 <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
 <h4 class=modal-title>Cari Absensi Instruktur</h4> </div>
 <div class="modal-body clearfix"> <div class="content controls"> 
<div class="form-row"> <div class="col-md-3">Tanggal:</div> <div class="col-md-9"> <div class="input-group"> <div class="input-group-addon"><span class="icon-calendar-empty"></span></div> <input id="dp1399605163151" class="datepicker form-control hasDatepicker" value="<? if ($_POST[cari_tanggal_1]==""){echo date('Y-m-d');} else { echo $_POST[cari_tanggal_1];}?>" type="text" name="cari_tanggal_1"> </div> </div> </div> 
<div class="form-row"> <div class="col-md-3">Sampai Tanggal:</div> <div class="col-md-9"> <div class="input-group"> <div class="input-group-addon"><span class="icon-calendar-empty"></span></div> <input id="dp1399605163151" class="datepicker form-control hasDatepicker" value="<? if ($_POST[cari_tanggal_2]==""){echo date('Y-m-d');} else { echo $_POST[cari_tanggal_2];}?>" type="text" name="cari_tanggal_2"> </div> </div> </div> 
<div style="visibility:hidden;"><input type=text name="page" value="absensi_siswa"></input></div>
 </div> </div> <div class=modal-footer>  <button type=submit class="btn btn-default btn-default">Cari</button> <button type=button class="btn btn-default btn-default" data-dismiss=modal>Batal</button></div> </form></div> </div> </div> 
 <!-- AKHIR FORM CARI ABSENSI -->
 
 


 
 <div class="col-md-12"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2><br>Data Absensi Instruktur <?  if ($_POST[cari_tanggal_1]<>''){echo $_POST[cari_tanggal_1]." hingga ".$_POST[cari_tanggal_2];}?>
</h2> </div> 
 <div class="modal modal-draggable modal-white" id=modal_ajax tabindex=-1 role=dialog aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title></h4> </div> <div class="modal-body clearfix np"> </div> </div> </div> </div>
<? if($_SESSION[hak_akses_absensi_pegawai]<>"true"){ echo " Ini hanya menampilkan data absensi anda saja. Data seluruhnya hanya dapat diakses oleh user yang berkepentingan didalamnya.<br><br> ";}?>
 			
<div class=btn-group>
   <a href=#cari_anggaran data-toggle=modal ><button class="btn btn-default tip"  data-original-title="Cari data absensi siswa per tanggal"> <span class=icon-search> </button></a>
   <a href=""  ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip"  data-original-title="Refresh"><span class=icon-refresh></span></button> </a>
   <a onclick="PrintDiv2();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> <span class=icon-print> </button></a>
	<a  href="#export" onclick="PrintDiv2();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export ke Excel"> <span class="icon-file"></span></button></a>
</div>
     <div class="btn-group"> <button class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"><span class="icon-cog"></span> Opsi <span class="caret"></span></button> 
	<ul class="dropdown-menu" role="menu">   
		 <li ><a href=# data-toggle=dropdown>Cari Absensi</a>
			 <ul class=dropdown-submenu> 
			   		<li><a href="absensi_instruktur_cari.php">Seluruh Instruktur PSPP Penerbangan </a></li> 
					<li><a href="absensi_instruktur_cari.php?unit=PSPP Lampung">Instruktur PSPP Lampung</a>
							<ul class=dropdown-submenu> 
							<? $query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan FROM absensi where absensi.id<>'' and status_user='Instruktur'  $filter_cari_nama $_SESSION[cari_tanggal] and unit='PSPP Lampung' order by absensi.tanggal asc limit 250");  $a=0; while($b=mysql_fetch_row($query)) { $a=$a+1;?>
							<li><a href="absensi_instruktur_cari.php?cari_nama=<? echo $b[1];?>"><? echo $a.".".$b[1];?></a></li> <? }?>
							</ul>
					</li> 
					<li><a href="absensi_instruktur_cari.php?unit=PSPP Jakarta">Instruktur PSPP Jakarta</a>
							<ul class=dropdown-submenu> 
							<? $query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan FROM absensi where absensi.id<>'' and status_user='Instruktur'  $filter_cari_nama $_SESSION[cari_tanggal] and unit='PSPP Jakarta' order by absensi.tanggal asc limit 250");  $a=0; while($b=mysql_fetch_row($query)) { $a=$a+1;?>
							<li><a href="absensi_instruktur_cari.php?&cari_nama=<? echo $b[1];?>"><? echo $a.".".$b[1];?></a></li> <? }?>
							</ul>
					</li> 
					<li><a href="absensi_instruktur_cari.php?unit=PSPP Jogja">Instruktur PSPP Yogyakarta</a>
							<ul class=dropdown-submenu> 
							<? $query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan FROM absensi where absensi.id<>'' and status_user='Instruktur'  $filter_cari_nama $_SESSION[cari_tanggal] and unit='PSPP Jogja' order by absensi.tanggal asc limit 250");  $a=0; while($b=mysql_fetch_row($query)) { $a=$a+1;?>
							<li><a href="absensi_instruktur_cari.php?cari_nama=<? echo $b[1];?>"><? echo $a.".".$b[1];?></a></li> <? }?>
							</ul>
					</li> 
					<li><a href="absensi_instruktur_cari.php?unit=PSPP Makassar">Instruktur PSPP Makassar</a>
							<ul class=dropdown-submenu> 
							<? $query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan FROM absensi where absensi.id<>'' and status_user='Instruktur'  $filter_cari_nama $_SESSION[cari_tanggal] and unit='PSPP Makassar' order by absensi.tanggal asc limit 250");  $a=0; while($b=mysql_fetch_row($query)) { $a=$a+1;?>
							<li><a href="absensi_instruktur_cari.php?cari_nama=<? echo $b[1];?>"><? echo $a.".".$b[1];?></a></li> <? }?>
							</ul>
					</li> 
					
			 </ul>
	</li>

	<li><a href="#export" onclick="PrintDiv2();" data-toggle=modal>Export ke Excel</a></li>
	<li><a href="">Refresh</a></li> 
	
	<li><a href=#print onclick="PrintDiv2();" data-toggle=modal>Print</a></li>
	</ul> </div>
	
	
	<? if ($_POST[cari_nama]<>""){ $filter_cari_nama=" and id_user like '%$_POST[cari_nama]%' ";}else{if ($_GET[cari_nama]<>""){ $filter_cari_nama=" and id_user like '%$_GET[cari_nama]%' ";}}?>
	
	<? if ($_GET[unit]<>""){ $filter_cari_kampus=" and unit='$_GET[unit]' ";}?>
	<? if ($_POST[cari_tanggal_1]<>""){ $filter_cari_tanggal=" and absensi.tanggal between '$_POST[cari_tanggal_1]' and '$_POST[cari_tanggal_2]' "; $_SESSION[cari_tanggal]=$filter_cari_tanggal;} if (!isset($_SESSION[cari_tanggal])) { $tanggal=date("Y-m-d"); $filter_cari_tanggal=" and absensi.tanggal = '$tanggal'"; $_SESSION[cari_tanggal]=$filter_cari_tanggal;} ?>
   <? if ($_GET[filter]=="instruktur"){$filter_instruktur=" and jabatan='Instruktur' and status_pegawai='Aktif' "; }?>
 <br>
 <br>

 
<div class="tab-pane" id="tab13"> <div id="divToPrint2"><p>

   
 <? $querya = mysql_query("SELECT  distinct absensi.tanggal FROM absensi where absensi.id<>'' and absensi.status_user='Instruktur'  $filter_cari_nama $_SESSION[cari_tanggal] $filter_cari_kampus order by absensi.tanggal asc limit 250"); while($u=mysql_fetch_row($querya)) { $tgggl=$u[0];?>  
 &nbsp; Absensi Tanggal <? echo $tgggl;?>
  <table  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;"> <thead> 
 <tr> <th width="30">No</th> <th>Nama Instruktur</th> <th >Jam Masuk</th> <th >Jam Keluar </th><th>Keterangan</th>  <th >Unit Kerja</th> </tr> 
</thead> <tbody> 
<?$a=0; 
 if($_SESSION[hak_akses_absensi_pegawai]<>"true"){
 $query = mysql_query("SELECT absensi.id, absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan,absensi.unit FROM absensi where absensi.id_user='$_SESSION[id_login]' and absensi.status_user='Instruktur'  $filter_cari_tanggal $filter_instruktur order by absensi.tanggal asc limit 250");
 }else{
$query = mysql_query("SELECT absensi.id,absensi.id_user, absensi.tanggal, absensi.jam_masuk, absensi.jam_keluar, absensi.keterangan,absensi.unit FROM absensi where absensi.tanggal='$tgggl' $filter_cari_nama $filter_cari_kampus and absensi.status_user='Instruktur'  $filter_instruktur order by absensi.tanggal asc limit 250");}

  while($b=mysql_fetch_row($query)) {
$a=$a+1;  ?>
<tr><td><? echo $a;?></td><td><? echo $b[1];?></td><td><? echo $b[3];?></td><td><? echo $b[4];?></td><td><? echo $b[5];?></td><td><? echo $b[6];?></td></tr>
<?} ?> 
 </tbody> </table> <br><br><? }?><br>
  


 </p> </div> </div>
 
 
 
 
 </div> 
 </div> 
 </div> 


 
 <script type=text/javascript src=../js/plugins/cleditor/jquery.cleditor.min.js></script> 
<link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
<script type=text/javascript src=../js/plugins/jquery/jquery-ui.min.js></script> 
<script type=text/javascript src=../js/plugins/jquery/jquery-migrate.min.js></script> 
<script type=text/javascript src=../js/plugins/jquery/globalize.js></script> 
<script type=text/javascript src=../js/plugins/bootstrap/bootstrap.min.js></script> 
<script type=text/javascript src=../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js></script> 
<script type=text/javascript src=../js/plugins/uniform/jquery.uniform.min.js></script> 
<script type=text/javascript src=../js/plugins/knob/jquery.knob.js></script> 
<script type=text/javascript src=../js/plugins/sparkline/jquery.sparkline.min.js></script> 
<script type=text/javascript src=../js/plugins/flot/jquery.flot.js></script> 
<script type=text/javascript src=../js/plugins/flot/jquery.flot.resize.js></script>
 <script type=text/javascript src=../js/js.js></script> 
 <script type=text/javascript src=../js/settings.js></script>
 <script type=text/javascript src=../js/jquery.colorbox.js></script>
 <script type=text/javascript src=../js/plugins/datatables/jquery.dataTables.min.js></script> 
  <script type=text/javascript src=../js/plugins/select2/select2.min.js></script>
  <script type=text/javascript src=../js/plugins/tagsinput/jquery.tagsinput.min.js></script> 
  <script type=text/javascript src=../js/plugins/jquery/jquery-ui-timepicker-addon.js></script> 
  <script type=text/javascript src=../js/plugins/ibutton/jquery.ibutton.js></script>
 
