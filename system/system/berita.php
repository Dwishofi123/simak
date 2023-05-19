<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>
<? 
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
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/berita_table.php",
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	getTable(1);
	

	function BoxEdit(id){
        $.colorbox({iframe:true, width:"95%", height:"150%", href: "system/edit_berita.php?id="+id});
      }
	  function BoxDelete(id){
        $.colorbox({iframe:true, width:"40%", height:"30%", href: "system/konfirm_hapus.php?id="+id+"&data=judul&table=content&page=psb"});
      }
	  function BoxTambah(){
        $.colorbox({iframe:true, width:"95%", height:"150%", href: "system/edit_berita.php"});
      }



    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>List Berita Kampus PSPP Penerbangan</h2> </div> 				 
 <div class="block">  <div class="content tab-content bg-dot50">

 <div class="tab-pane active">
 <font color="yellow">PERHATIAN : Berita ini khusus untuk berita resmi di website resmi PSPP Penerbangan (Bukan Website Pribadi). Setiap ada kegiatan dikampus, diharapkan perwakilan kampus selalu menulis berita disini agar berita kegiatan bisa dibaca oleh pengguna internet. Marketing juga diizinkan untuk menulis artikel seputar kegiatan promosinya disini. </font><br><br>
 	 <a href=#tambah_data onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-success  tip"  data-original-title="Tambah data baru"> Tambah</button></a>
	 <a href="#refresh" onClick='getPage(13)' ><button class="btn btn-default btn-clean tip"  > Refresh </button></a>
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> Export ke Excel</button></a>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>

   <br><br>
   

		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=center><img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font></div>
		<!-- TABLE --> </div>
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

