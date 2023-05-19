<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "konek.php";?>
 <? include "pikachu.php";?>
 <script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
 <link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
 <script type="text/javascript">
function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint10');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>

<script type="text/javascript">
$(document).ready(function() {
 $("#export_10").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint10').html()));     
 });
}); 
</script>

 <div class=col-md-12>
<? $query = mysql_query("SELECT* from pegawai where pegawai.id=$_GET[id]"); 
while($b=mysql_fetch_array($query)) {?>
<div class="block"> 
<div class="header"> <h2>Tambah Kasbon  - <? echo $b[nama]; $nama=$b[nama]; ?></h2> </div> 
<div class="content controls"> 
 <form action="submit_kasbon.php?id=<? echo $_GET[id];?>&nama=<? echo $b[3];?>" method="POST">
<div class="form-row"> <div class="col-md-3">Transaksi :</div> 
<div class="col-md-9">
<select class="form-control" name=status> 
 <option>Pengambilan Kasbon (+)</option> 
 <option>Pengembalian Kasbon (-)</option>
 </select></div> </div> 
<div class="form-row"> <div class="col-md-3">Nominal :</div> <div class="col-md-9"><input class="form-control" value="" type="text" name="nominal" ></div> </div> 
 <div class="form-row"> <div class="col-md-3">Catatan :</div> <div class="col-md-9"><input class="form-control" value="" type="text" name="uraian"></div> </div>

&nbsp; &nbsp; <button   type=submit class="btn  btn-default" data-dismiss=modal>Simpan & Cetak Kwitansi</button>
<div><br><br></div></form>
<? }?>

<div class="block" id="divToPrint10">
<div class="header" > <h2 >History Transaksi Kasbon - <? echo $nama;?></h2> </div> 


 <table cellpadding=1 cellspacing=1 width=80% align=center padding=10 style="text-align:left; font-size:12px;"> <thead> 
 <tr> <th width="30">No</th> <th>Tanggal</th> <th >Uraian</th> <th >Nominal</th></tr> 
</thead> <tbody> 
<? 
$a=0; 
$query = mysql_query("SELECT * from kasbon where kasbon.id_pegawai=$_GET[id] and nominal<>0 order by id desc"); 
while($b=mysql_fetch_array($query)) {
$a=$a+1;?>

<tr>    
<td><? echo $a; ?></td> 
<td><? echo $b[tanggal];?> </td> 
<td><? echo $b[keterangan];?> admin :<? echo $b[user_id];?></td>  <td><? echo "Rp " . number_format($b[nominal],0,',','.');?></td> </tr> 
<? }?> 
<tr>    <td></td> <td></td> <td><strong>TOTAL KASBON<strong></td>  <td><strong><?  $query2 = mysql_query("SELECT sum(nominal) from kasbon where id_pegawai=$_GET[id]"); while($c=mysql_fetch_row($query2)) { echo "Rp " . number_format($c[0],0,',','.'); };?><br><br><br><br><br></strong></td> </tr> 

 </tbody> </table>
</div>

<div class=modal-footeraaa style="padding:10px;"><button onclick="javascript:void(0);" id="export_10"  type=button class="btn  btn-default" data-dismiss=modal>Export ke Excel</button> <button onclick="PrintDiv();"  type=button class="btn  btn-default" data-dismiss=modal>Cetak</button></div> 


 </div> </div></div>