<div style="visibility:hidden; height:0px;">
<?php session_start();?></div><?php include "konek.php";
if($_SESSION['status_login']<>"true")
{
	?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><?php
	}

?>
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
			url: "system/siswa_interview_table.php",
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	getTable(1);
	
	function filterKelas() {
	//var kelasValue = document.getElementById('kelasFilter');
	//kelas = kelasValue.value;
	
	var angValue = document.getElementById('angkatan');
	ang = angValue.value;
	
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/siswa_interview_table.php?angkatan="+ang,
			data:'angkatan='+ang+'id=4',
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
		//getTable(4);
	}
	
	
	 function form_inter_pramugari(id){
        $.colorbox(
		{
			iframe:true, width:"90%", height:"90%", href: "system/form_interview_pramugari.php?id="+id
		}
		
		);
      } 
	  function form_inter_staff(id){
        $.colorbox({iframe:true, width:"90%", height:"90%", href: "system/form_interview_staff.php?id="+id});
      }

    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Input Data Interview</h2> </div> 				 
 <div class="block"> 
 <!--<div class="head bg-default bg-light-ltr np"> 
 <ul class="nav nav-tabs pull-left"> 
 <li class="active"><a href="#tab13" onClick=getTable(1) data-toggle="tab"><i class="icon-css3"></i> Seluruh Kampus</a></li>
 <li class=""><a href="#tab13" onClick=getTable(2)  data-toggle="tab"><i class="icon-html5"></i> Per Kampus</a></li> 
 <li class=""><a href="#tab13" onClick=getTable(3)  data-toggle="tab">
 
 <i class="icon-github"></i> Per Jurusan</a></li> 
 <li class="">
 
 
 <li><select  name="kelasFilter" id="kelasFilter" ><? $query = mysql_query("select distinct(ps_prodi) from profil_siswa"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" <? if($b[0]==$text_psb_aktif){ echo "selected=selected";}?>><? echo $b[0];?></option><?}?></select></li> 
 
 
  <li><select  name="kelasAngkatan" id="kelasAngkatan" ><? $query = mysql_query("select distinct(ps_ang) from profil_siswa"); while($b=mysql_fetch_row($query)) {?><option onClick="filterKelas()" ><? echo $b[0];?></option><?}?></select></li> 
  
  
 
 </ul> </div>-->
 <div class="head bg-default bg-light-ltr np"> 
 <ul class="nav nav-tabs pull-left"> 
	
	<li class=""><a href="#tab13" onClick=getTable(2)  data-toggle="tab"><i class="icon-html5"></i> Belum Diinterview</a></li> 
	<li class=""><a href="#tab13" onClick=getTable(3)  data-toggle="tab"><i class="icon-css3"></i> Sudah Diinterview</a></li> 

	<?php /*
 <li class=""><a href="#tab13" onClick=getTable(4)  data-toggle="tab">
 
 <i class="icon-github"></i> Per Angkatan</a></li> 
 <li class="">

 <li>
	<select  name="angkatan" id="angkatan" >
	<?php $query = mysql_query("select distinct(Jurusan) from siswa");
	while($b=mysql_fetch_array($query)) 
	{
		?>
		<option onClick="filterKelas()" ><?php echo $b['Jurusan'];?></option><?php 
	}
	?>
	</select>
</li> 
  </li>
  
 */
 ?>
 </ul> </div>
 <div class="content tab-content bg-dot50">

 <div class="tab-pane active">

	   <div class=btn-group>
   <!--<a href=#tambah_data onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Tambah data baru"> Tambah</button></a>-->
   <a href="#" onClick='getPage(42)' ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip"  data-original-title="Refresh">Refresh</button> </a> 
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

