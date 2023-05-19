<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>
<? $tgls=date("Y-m-d H:i:s"); mysql_query("insert into tbl_log(datetime,uraian)values('$tgls','$_SESSION[nama_login] membuka halaman nilai ujian siswa')");
$query = mysql_query("SELECT * from config"); while($b=mysql_fetch_row($query)) {$psb_aktif="and jurusan like '%$b[1]%' "; $text_psb_aktif=$b[1];}?>

<script type="text/javascript">
$(document).ready(function() {
 $("#export_13").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint13').html()));     
 });
}); 

function PrintDiv13() {    
           var divToPrint = document.getElementById('divToPrint13');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }

function getTable(id) {
		
    var kelasValue = document.getElementById('kelasFilter');
	kelas = kelasValue.value;
	
	var kampusValue = document.getElementById('KampusFilter');
	kampus = kampusValue.value;

	var materiValue = document.getElementById('materiFilter');
	materi = materiValue.value;	
	
	
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/nilai_ujian_table.php?kelas="+kelas+"&kampus="+kampus+"&materi="+materi,
			data:"kelas="+kelas+"&kampus="+kampus+"&materi="+materi,
			type: "GET",
			success:function(data){$('#tables').html(data);}
		});
	}
	
	

	
	function filterKelas() {
	var kelasValue = document.getElementById('kelasFilter');
	kelas = kelasValue.value;
	
	var kampusValue = document.getElementById('KampusFilter');
	kampus = kampusValue.value;

	var materiValue = document.getElementById('materiFilter');
	materi = materiValue.value;	
	
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/nilai_ujian_table.php?kelas="+kelas+"&kampus="+kampus+"&materi="+materi,
			data:"kelas="+kelas+"&kampus="+kampus+"&materi="+materi,
			type: "GET",
			success:function(data){$('#tables').html(data);}
		});
		
		getTable(1);
	}
	
	
	



    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Nilai Ujian Bulanan</h2> </div> 				 
 <div class="block"> <div class="head bg-default bg-light-ltr np"> <ul class="nav nav-tabs pull-left"> <li class="active"><a href="#tab13" onClick=getTable(1) data-toggle="tab"><i class="icon-css3"></i> Nilai Hasil Ujian Bulanan Siswa-i PSPP Penerbangan</a></li> 
 
 <li><select  name="materiFilter" id="materiFilter" ><? $query = mysql_query("select distinct(materi) from nilai"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" <? if($b[0]==$text_psb_aktif){ echo "selected=selected";}?>><? echo $b[0];?></option><?}?></select></li>  
 
 <li style="visibility:hidden;width:0px;"><select  name="kelasFilter" id="kelasFilter" ><? $query = mysql_query("select distinct(jurusan) from nilai"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" <? if($b[0]==$text_psb_aktif){ echo "selected=selected";}?>><? echo $b[0];?></option><?}?></select></li>   
 
 <li><select  name="KampusFilter" id="KampusFilter" ><? $query = mysql_query("select distinct(kampus) from nilai"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" ><? echo $b[0];?></option><?}?><option onClick="filterKelas()">Semua Kampus</option></select></li> </ul> </div> <div class="content tab-content bg-dot50">

 <div class="tab-pane active">

	   <div class=btn-group>
   <!--<a href=#tambah_data onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Tambah data baru"> Tambah</button></a>-->
   <a href="#" onClick='filterKelas()' ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip"  data-original-title="Refresh">Tampilkan/Refresh</button> </a> 
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> Export ke Excel</button></a>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>
	<? if ($_SESSION[hak_akses_public]=="true"){?><a  href="#export_custom" onClick='getPage(21)'><button class="btn btn-clean btn-default tip"  data-original-title="Export to Excel"> Custom Export Excel </button></a><?}?>
	
   </div>
   <br><br>
		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=center></div>
		<!-- TABLE --> </div>
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

