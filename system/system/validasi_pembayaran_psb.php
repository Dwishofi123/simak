<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>
<? 
$query = mysql_query("SELECT * from config"); while($b=mysql_fetch_row($query)) {$psb_aktif="and jurusan like '%$b[1]%' "; $text_psb_aktif=$b[1]; $_SESSION['psb.aktif']=$b[1];}?>

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
			url: "system/validasi_psb_table.php",
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	getTable(2);
	
	
	
	function filterKelas() {
	var kelasValue = document.getElementById('kelasFilter');
	kelas = kelasValue.value;
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/validasi_psb_table.php?kelas="+kelas,
			data:'kelas='+kelas,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
		getTable(2);
	}
	
	
	
	  function Formulir(id){
        $.colorbox({iframe:true, width:"60%", height:"90%", href: "system/formulir_psb.php?id="+id});
      }
	  function Validasi(id){
        $.colorbox({iframe:true, width:"50%", height:"40%", href: "system/submit_validasi_psb.php?id="+id+"&status=validasi"});
      }
	  function BatalkanValidasi(id){
        $.colorbox({iframe:true, width:"30%", height:"20%", href: "system/submit_validasi_psb.php?id="+id+"&status=batalkan"});
      }
	function BoxEdit(id){
        $.colorbox({iframe:true, width:"50%", height:"80%", href: "system/edit_data_psb.php?id="+id});
      }
	  function BoxDelete(id){
        $.colorbox({iframe:true, width:"40%", height:"30%", href: "system/konfirm_hapus.php?id="+id+"&data=nama&table=siswa&page=psb"});
      }

    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Biaya Pendaftaran & Cetak Formulir Pendaftaran</h2> </div> 				 
 <div class="block"> <div class="head bg-default bg-light-ltr np"> <ul class="nav nav-tabs pull-left"><li class="active"><a href="#tab13" onClick=getTable(2)  data-toggle="tab"><i class="icon-html5"></i> Siswa Belum Divalidasi Pembayarannya</a></li>  <li ><a href="#tab13" onClick=getTable(1) data-toggle="tab"><i class="icon-css3"></i> Siswa Sudah Divalidasi Pembayarannya</a></li> <li><select  name="kelasFilter" id="kelasFilter" onChange="filterKelas()" ><? $query = mysql_query("select distinct(jurusan) from siswa"); while($b=mysql_fetch_row($query)) {?><option  <? if($b[0]==$text_psb_aktif){ echo "selected=selected";}?>><? echo $b[0];?></option><?}?></select></li> </ul> </div> <div class="content tab-content bg-dot50">

 <div class="tab-pane active">
 
 	 
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> Export ke Excel</button></a>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>
	<? if ($_SESSION[hak_akses_public]=="true"){?><a  href="#export_custom" onClick='getPage(21)'><button class="btn btn-clean btn-default tip"  data-original-title="Export to Excel"> Custom Export Excel </button></a><?}?>
	
   <br><br>
   

		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=center><img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font></div>
		<!-- TABLE --> </div>
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

