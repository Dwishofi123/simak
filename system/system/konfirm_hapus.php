<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<?  include "konek.php"; $tanggal=date("Y-m-d H:i:s");
 $query=mysql_query("select $_GET[data] from $_GET[table] where id=$_GET[id]"); 
 while($b=mysql_fetch_row($query)) {
 mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] mencoba menghapus data $b[0] di table $_GET[table]')");
?>
Anda yakin akan mengapus data <? echo $b[0];?>?
 <div class=modal-footer>  <a href="submit_delete.php?id=<? echo $_GET[id];?>&table=<? echo $_GET[table]; ?>&page=<? echo $_GET[page];?>"><button type=submit class="btn btn-success btn-clean">Ya</button></a> <button type=button class="btn btn-success btn-clean" data-dismiss=modal>Tidak</button></div> 
<? }?>

