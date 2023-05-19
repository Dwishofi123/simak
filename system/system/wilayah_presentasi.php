<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<script>
	  function Detil(id){
        $.colorbox({iframe:true, width:"50%", height:"80%", href: "system/wilayah_presentasi_view.php?id="+id});
      }
	  
	 function lihat_sma(id) {
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/wilayah_presentasi_view.php",
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	
</script>
<? $aidi=$_SESSION[id_login];
$tanggal=date("Y-m-d H:i:s");
mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] membuka halaman wilayah presentasi marketing')"); ?>
      

 
 <div class="row"> <div class="col-md-9"> <div class="block nav-tabs-vertical"> 
 <div class="head bg-default bg-light"> 
 <h2>Data SMA/SMK Terkunci Presentasi Marketing &nbsp; </h2> 
 </div> 
 
 <div class="tabs"> 
 <ul class="nav nav-tabs"> 
 
 <li <? if ($c[0]==""){ echo 'class=active';}?>><a href="#tab0" onClick=lihat_sma(0) data-toggle="tab">ALL SMA TERKUNCI</a></li> 
 <? $a=0; $query = mysql_query("select distinct(marketing_pengunci) from database_sekolah");  while($b=mysql_fetch_row($query)) { $a=$a+1;
 $queryc = mysql_query("select id,nama from pegawai where id='$b[0]'");  while($c=mysql_fetch_row($queryc)) {?>
 <li class="<? if ($c[0]==$_GET[id]){ echo 'class=active';}?>"><a href="#tab<? echo $b[0];?>" onClick=lihat_sma(<? echo $b[0];?>) data-toggle="tab"><? echo $c[1];?></a></li> 
 <? }}?>
 </ul> 
 
 <div class="content tab-content"> 
 <div class="tab-pane active" id="tab<? if ($_GET[id]<>''){echo $_GET[id];}else{echo "0";} ?>"> <p><div id="tables" ><? if ($_GET[id]<>""){ $query = mysql_query("select * from database_sekolah where marketing_pengunci='$_POST[id]'"); }else{ $query = mysql_query("select * from database_sekolah where marketing_pengunci<>''");} $x=0; while($d=mysql_fetch_row($query)) { $x=$x+1; echo $x.". ".$d[2]." - ".$d[3]." - ".$d[4]." - ".$d[5]." - ".$d[6]."<br>";}?>  </div></p> </div> 
 
 
 </div> </div> </div> </div>  </div>
 
 