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


function ViewKasbon(id){
        $.colorbox({iframe:true, width:"60%", height:"90%", href: "system/kasbon_view.php?id="+id});
      }
</script>
 
 <!-- FORM TAMBAH KASBON  -->
<div class="modal modal-draggable modal-white" id=modal_default_2 tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true>
 <div class=modal-dialog> 
 <div class=modal-content>
 <form action="system/submit_kasbon.php" method="post">
 <div class=modal-header> 
 <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
 <h4 class=modal-title>Tambah Data Kasbon</h4> </div>
 <div class="modal-body clearfix"> <div class="content controls"> 
 <div class="form-row"> 
  <div class="col-md-3">Nama :</div> <div class="col-md-7">
 <select class="form-control" name="aidi"> 
 <? $query = mysql_query("SELECT pegawai.ID, pegawai.nama FROM pegawai where pegawai.status_pegawai='Aktif'"); while($b=mysql_fetch_row($query)) {?>
 <option><? echo $b[1]." | ".$b[0];?></option> <?}?>
 </select>   
  </div>
  
  
  
 <div class="col-md-3">Status Kasbon Karyawan :</div> <div class="col-md-9"> 
 <select class="form-control" name=status> 
 <option>Pengambilan Kasbon</option> 
 <option>Pengembalian Kasbon</option>
 </select> </div> 
 
 <div class="col-md-3">Uraian:</div> <div class="col-md-7"><textarea class="form-control" name="uraian" placeholder="Isikan uraian disini"></textarea></div>
 <div class="col-md-3">Nominal:</div> <div class="col-md-7"><input class="form-control" value="" type="text" name="nominal"></div>
<div style="visibility:hidden;"><input type=text name=page value="<? echo $_GET[page];?>"></input></div>
 </div>
 </div> </div> <div class=modal-footer>  <button type=submit class="btn btn-success btn-clean">Simpan</button> <button type=button class="btn btn-success btn-clean" data-dismiss=modal>Batal</button></div> </form></div> </div> </div> 
 <!-- AKHIR FORM TAMBAH KASBON -->
 
				
<div class="modal modal-draggable modal-white" id=modal_default_1 tabindex=-1 role=dialog aria-labelledby=myModalLabel aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title>Petunjuk Penggunaan</h4> </div> <div class="modal-body clearfix"> <p> &nbsp; no koment...</p> </div> <div class=modal-footer> <button type=button class="btn btn-warning btn-clean" data-dismiss=modal>Close</button> </div> </div> </div> </div>
						
 
 
 
 
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Data Kasbon  Karyawan</h2> </div> 
 <div class="modal modal-draggable modal-white" id=modal_ajax tabindex=-1 role=dialog aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title></h4> </div> <div class="modal-body clearfix np"> </div> </div> </div> </div>
					
<div class=btn-group>
   
   <a href="#" onClick='getPage(17)'  ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip" data-original-title="Refresh"><span class=icon-refresh></span></button> </a>
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> <span class="icon-file"></span></button></a>	
	<a onclick="PrintDiv();" data-toggle=modal ><button class="btn btn-default btn-clean tip" data-original-title="Print"> <span class=icon-print> </button></a>
</div>

    <div class="btn-group"> <button class="btn btn-default btn-clean dropdown-toggle" data-toggle="dropdown"><span class="icon-cog"></span> Opsi <span class="caret"></span></button> 
	<ul class="dropdown-menu" role="menu">
	<li><a href="#" onClick='getPage(17)'>Refresh</a></li> 
	<li><a href=#print onclick="PrintDiv();" data-toggle=modal>Print</a></li>
	</ul> </div> 

	
	</div>  
   
   
 <br>
 <br>

 
  <div class="block" id="divToPrint"> <div class="block">  <div class="content tab-content bg-dot50"> 
 
 <table  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
 <tr> <th width="30">No</th> <th>Nama</th> <th >Jabatan</th> <th >Unit Kerja </th><th>Total Kasbon</th></tr> 
</thead> <tbody> 
<?$a=0;
 $query = mysql_query("SELECT pegawai.ID, pegawai.nama, pegawai.jabatan, pegawai.unit FROM pegawai where pegawai.status_pegawai='Aktif' $hak_akses_publik $filter_cari order by nama asc"); while($b=mysql_fetch_row($query)) {
 $query2 = mysql_query("SELECT sum(nominal) from kasbon where id_pegawai=$b[0]"); while($c=mysql_fetch_row($query2)) { $nominal=" Rp " . number_format($c[0],0,',','.'); }
$a=$a+1;?>
<tr>    <td><? echo $a; ?></td> <td><a href="#view" onClick=ViewKasbon(<? echo $b[0];?>) data-title="Data Trsansaksi Kasbon"  class="modal-ajax tip" data-original-title="Lihat transaksi kasbon <? echo $b[1];?>"><? echo str_replace($_POST[cari],"<font color=yellow>$_POST[cari]</font>",$b[1]);?>  &nbsp; <span class="icon-book"></span></a></td> <td><? echo $b[2];?></td>  <td><? echo $b[3];?></td> <td><? echo $nominal;?></td> </tr> 
<? }?> 
 </tbody> </table> 

  
 </div> </div></div>
 
 
 
 
 </div> 



 
 
 
