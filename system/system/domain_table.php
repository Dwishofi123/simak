<? session_start();
include "konek.php";
$psb_aktif=" and jurusan='".$_SESSION['psb.aktif']."' ";?>


	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Alamat Website</th> </tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from domain where pemilik='$_SESSION[id_login]'"); while($b=mysql_fetch_row($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[1];?> </td></tr> <? }?> 
	</tbody> </table> 