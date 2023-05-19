<? session_start();
include "konek.php";?>


	<table border=1  class="table table-bordered table-striped table-hover"  cellpadding=0 cellspacing=0 width=100% style="text-align:left;" > <thead> 
			 <tr> <th width="30">No</th> <th >Judul Artikel</th> <th>Status Publikasi</th><th>Action</th></tr> 
			</thead> <tbody> 
			<?$a=0; $query = mysql_query("select * from content where grup='berita' order by id desc"); while($b=mysql_fetch_array($query)) {
			$a=$a+1;?>
			<tr>   <td><? echo $a; ?></td> <td><? echo $b[judul];?></td><td><? if ($b[pub]=="true"){echo "Aktif";}else{echo "Tidak Aktif";} ?></td><td> <a href="#edit" onClick='BoxEdit(<? echo $b[0];?>)'><span class="icon-edit"></span></a> <a href="#hapus" onClick='BoxDelete(<? echo $b[id];?>)'> <span class="icon-trash"></span></a> </td></tr> <? }?> 
	</tbody> </table> 