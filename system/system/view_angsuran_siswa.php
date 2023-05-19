<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek176.php";?>
<link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "konek176.php";?>
<? include "pikachu.php";?>
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

 <div class=col-md-12  >
<? $query = mysql_query("SELECT * from siswa_aktif where id=$_GET[id]"); while($b=mysql_fetch_array($query)) {?>
<div class="block"> 
<div class="header"> <h2>Data Pembayaran  - <? echo $b[2]; $nama=$b[2]; ?></h2> </div> 
<div class="content controls"> 
 <form action="index.php?page=perlengkapan_siswa">
<div class="form-row"> <div class="col-md-3">Nama  :</div> <div class="col-md-9"><input name="" class="form-control" value="<? echo $b[nama];?>" type="text" disabled="disabled"></div> </div> 
<div class="form-row"> <div class="col-md-3">Jurusan :</div> <div class="col-md-9"><input name="" class="form-control" value="<? echo $b[jurusan];?>" type="text"  disabled="disabled"></div> </div> 
<div class="form-row"> <div class="col-md-3">Kampus :</div> <div class="col-md-9"><input class="form-control" value="<? echo $b[kampus];?>" type="text"  disabled="disabled" ></div> </div> 

<div><br><br></div></form>

 <div class="block" id="divToPrint10">
<div class="header"> <h2>History Pembayaran Angsuran - <? echo $nama;?></h2> </div> 

<br>
 <table  border=1  class="table table-bordered table-striped table-hover"  cellpadding=1 cellspacing=1 width=80% align=center padding=10  style="text-align:left; font-size:12px;"> <thead> 
 <tr> <th width="30">No</th> <th>Jenis Pembayaran</th> <th >Tgl & Uraian Transfer</th> <th >Nominal</th></tr> 
</thead> <tbody> 
<tr> 
	<td>1</td>
	<td>Angsuran 1(Daftar Ulang)</td>  
	<td><? if ($b[tgl_bayar_1]=="") {echo $b[tgl_bayar_1];}else{echo $b[tgl_bayar_1];}?> </td>  
	<td><? echo "Rp " . number_format($b[pembayaran_1],0,',','.');?></td> 
</tr> 
<tr> <td>2</td> <td>Angsuran 2</td> <td><? if ($b[tgl_bayar_2]==""){ echo $b[tgl_bayar_2];}else{echo "$b[tgl_bayar_2] ($b[keterangan_2])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_2],0,',','.');?></td> </tr> 
<tr> <td>3</td>  <td>Angsuran 3</td> <td><? if ($b[tgl_bayar_3]==""){ echo $b[tgl_bayar_3];}else{echo "$b[tgl_bayar_3] ($b[keterangan_3])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_3],0,',','.');?></td> </tr> 
<tr> <td>4</td>  <td>Angsuran 4</td><td><? if ($b[tgl_bayar_4]==""){ echo $b[tgl_bayar_4];}else{echo "$b[tgl_bayar_4] ($b[keterangan_4])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_4],0,',','.');?></td> </tr> 
<tr> <td>5</td> <td>Angsuran 5</td><td><? if ($b[tgl_bayar_5]==""){ echo $b[tgl_bayar_5];}else{echo "$b[tgl_bayar_5] ($b[keterangan_5])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_5],0,',','.');?></td> </tr> 
<tr> <td>6</td><td>Angsuran 6</td> <td><? if ($b[tgl_bayar_6]==""){ echo $b[tgl_bayar_6];}else{echo "$b[tgl_bayar_6] ($b[keterangan_6])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_6],0,',','.');?></td> </tr> 
<tr> <td>7</td>  <td>Angsuran 7</td><td><? if ($b[tgl_bayar_7]==""){ echo $b[tgl_bayar_7];}else{echo "$b[tgl_bayar_7] ($b[keterangan_7])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_7],0,',','.');?></td></tr> 
<tr> <td>8</td>  <td>Angsuran 8</td><td><? if ($b[tgl_bayar_8]==""){ echo $b[tgl_bayar_8];}else{echo "$b[tgl_bayar_8] ($b[keterangan_8])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_8],0,',','.');?></td></tr> 
<tr> <td>9</td>  <td>Angsuran 9</td><td><? if ($b[tgl_bayar_9]==""){ echo $b[tgl_bayar_9];}else{echo "$b[tgl_bayar_9] ($b[keterangan_9])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_9],0,',','.');?></td></tr> 
<tr> <td>10</td> <td>Angsuran 10</td><td><? if ($b[tgl_bayar_10]==""){ echo $b[tgl_bayar_10];}else{echo "$b[tgl_bayar_10] ($b[keterangan_10])";}?> </td><td><? echo "Rp " . number_format($b[pembayaran_10],0,',','.');?></td> </tr> 
<tr> <td></td> <td></td> <td>Total</td>  <td><? echo "Rp " . number_format($b[total_pembayaran],0,',','.');?></td> </tr> 
 </tbody> </table>
<? }?> 

</div>


<div class=modal-footer> 

<div><button onclick="javascript:void(0);" id="export_10"  type=button class="btn  btn-default" data-dismiss=modal>Export ke Excel</button><button onclick="PrintDiv();" type=button class="btn btn-default" data-dismiss=modal>Cetak</button></div> 


 </div> </div></div>