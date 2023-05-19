<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and ps_kampus='$_SESSION[unit]'"; }  ?>
<? 
$query = mysql_query("SELECT * from config"); while($b=mysql_fetch_row($query)) {$psb_aktif="and ps_prodi like '%$b[1]%' "; $text_psb_aktif=$b[1];}?>

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
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/penilaian_siswa_table.php",
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	getTable(1);
	
	function filterKelas() {
	var kelasValue = document.getElementById('kelasFilter');
	kelas = kelasValue.value;
	
	var angValue = document.getElementById('kelasAngkatan');
	ang = angValue.value;
	
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/penilaian_siswa_table.php?kelas="+kelas+"&angkatan="+ang,
			data:'kelas='+kelas+"&angkatan="+ang,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
		getTable(1);
	}
	
	
	

    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Grade Penilaian Siswa </h2> </div> 				 
 <div class="block"> <div class="head bg-default bg-light-ltr np"> <ul class="nav nav-tabs pull-left"> <li class="active"><a href="#tab13" onClick=getTable(1) data-toggle="tab"><i class="icon-css3"></i> Seluruh Kampus</a></li> <li class=""><a href="#tab13" onClick=getTable(2)  data-toggle="tab"><i class="icon-html5"></i> Per Kampus</a></li> <li class=""><a href="#tab13" onClick=getTable(3)  data-toggle="tab"><i class="icon-github"></i> Per Jurusan</a></li> <li class="">
 
 
 <li><select  name="kelasFilter" id="kelasFilter" ><? $query = mysql_query("select distinct(ps_prodi) from profil_siswa"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" <? if($b[0]==$text_psb_aktif){ echo "selected=selected";}?>><? echo $b[0];?></option><?}?></select></li> 
 
 
  <li><select  name="kelasAngkatan" id="kelasAngkatan" ><? $query = mysql_query("select distinct(ps_ang) from profil_siswa"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" ><? echo $b[0];?></option><?}?></select></li> 
  
  
 
 </ul> </div> <div class="content tab-content bg-dot50">

 <div class="tab-pane active">

	   <div class=btn-group>
   <!--<a href=#tambah_data onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Tambah data baru"> Tambah</button></a>-->
   <a href="#" onClick='getPage(40)' ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip"  data-original-title="Refresh">Refresh</button> </a> 
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> Export ke Excel</button></a>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>
	
   </div>
   <br><br>
		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=center><img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font></div>
		<!-- TABLE --> </div>
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

