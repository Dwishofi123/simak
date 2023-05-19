<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and unit='$_SESSION[unit]'"; }?>
  
<script type="text/javascript">
function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
<script type="text/javascript">
$(document).ready(function() {
 $("#export_13").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint').html()));     
 });
}); 


function ViewAngsuran(id){
        $.colorbox({iframe:true, width:"50%", height:"80%", href: "system/view_angsuran_siswa.php?id="+id});
      }
</script>
 
 
 
 
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Konfirmasi Pembayaran Siswa Melalui Aplikasi Android</h2> </div> 
 <div class="modal modal-draggable modal-white" id=modal_ajax tabindex=-1 role=dialog aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title></h4> </div> <div class="modal-body clearfix np"> </div> </div> </div> </div>
					
<div class=btn-group>
   
   <a href="#" onClick='getPage(39)'  ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip" data-original-title="Refresh"><span class=icon-refresh></span></button> </a>
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> <span class="icon-file"></span></button></a>	
	<a onclick="PrintDiv();" data-toggle=modal ><button class="btn btn-default btn-clean tip" data-original-title="Print"> <span class=icon-print> </button></a>
</div>

    <div class="btn-group"> <button class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"><span class="icon-cog"></span> Opsi <span class="caret"></span></button> 
	<ul class="dropdown-menu" role="menu">
	<li><a href="#" onClick='getPage(39)'>Refresh</a></li> 
	<li><a href=#print onclick="PrintDiv();" data-toggle=modal>Print</a></li>
	</ul> </div> 

	
	</div>  
  <br>
     <font color="yellow">Perhatian :<br>
  Halaman ini hanya menampilkan 250 data konfirmasi pembayaran terakhir yang dilakukan siswa melalui handphone android siswa. <br>Lakukan backup data setiap minggu melalui Export Excel. Terima kasih</font>
 <br>
 <br>

 
  <div class="block" id="divToPrint"> <div class="block">  <div class="content tab-content bg-dot50"> 
 <table  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
 <tr> <th width="30">No</th> <th>Tanggal Upload</th> <th >Nama Siswa</th><th >Nodaf</th> <th>Jurusan</th><th>Marketing</th><th>Angsuran</th><th>Tanggal Transfer</th><th>Nominal</th><th>Pemilik Rekening</th><th>Bukti Transfer</th></tr> 
</thead> <tbody> 
<?$a=0;
$kampus=split(" ",$_SESSION[unit]);

$kampus=$kampus[1];

 
 $query = mysql_query("SELECT * from konfirmasi_pembayaran where kampus='$kampus' order by tanggal_upload desc limit 250 ") or die(mysql_error()); while($b=mysql_fetch_array($query)) {

 $queryl = mysql_query("SELECT ps_mark,ps_nodaf from profil_siswa where ps_nama='$b[nama]' and ps_prodi='$b[jurusan]' and ps_kampus='$b[kampus]'") or die(mysql_error()); 
 
 while($c=mysql_fetch_row($queryl)) { 

 $marketing=$c[0];}
 
 
 
$a=$a+1;?>

<tr> 
<td><? echo $a;?></td>
 <td><? echo $b[tanggal_upload];?></td> <td><? echo $b[nama];?></td><td><? echo $b[nodaf];?><td><? echo $b[jurusan];?></td><td><? echo $marketing;?></td><td>Angsuran <? echo $b[angsuran];?></td><td><? echo $b[5];?></td><td><? echo $b[7];?></td><td><? echo $b[6];?></td><td><a href="../android/img/tanda bukti transfer/<? echo $b[8];?>" target="_blank"><button class="btn btn-default btn-clean" type="button">Download</button></a></td></tr> 

<? }?> 
 </tbody> </table> 

  
 </div> </div></div>
 
 
 
 
 </div> 



 
 
 
