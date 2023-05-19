<? session_start();?>


<link rel=icon type=../image/ico href="favicon.html"/> 
<link href=../css/stylesheets.css rel=stylesheet type=text/css /> 
<script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">



<script>
function bantuan(){
alert('Uups! Maaf belum tersedia.');
}

function laporkan_kerusakan(){
alert('Silakan laporkan kerusakan(bug) aplikasi melalui form kritik dan saran yang telah kami disediakan di aplikasi ini.');
}


function Simpan() {
	var kritikValue = document.getElementById('kritik');
	kritik = kritikValue.value;
	var SiswaValue = document.getElementById('namasiswa');
	siswa = SiswaValue.value;
		$('#frm_kritik').html("<img src='../img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "kritiksaran_portable.php?kritik="+kritik+"&siswa="+siswa,
			data:'kritik='+kritik,
			type: "POST",
			success:function(data){$('#frm_kritik').html(data);}
		});
		
	}

</script>


<? if ($_GET[kritik]<>""){ include "konek.php"; $tanggal=date("Y-m-d H:i:s"); mysql_query("insert into kritik_dan_saran(tanggal,user,uraian,unit)values('$tanggal','$_GET[siswa]','$_GET[kritik]','Ujian Online System')"); echo "<font color='yellow'><strong>Terima kasih atas kepedulian anda dengan memberikan kritik dan saran kepada kami. <br>Kritik dan saran yang membangun adalah harapan kami. <br>Kritik dan saran telah kami terima dan akan segera kami tindaklanjuti. Terima kasih</strong></font>"; 

mysql_query("insert into tbl_log(datetime,uraian)values('$tanggal','PSPPInt - $_GET[siswa] mengirim kritik dan saran : $_GET[kritik] ')");

} else{?>




 <div id=kritiks>
 <div class=col-md-10> <div class=block> 
 <div class="content"> <br><h4>Sampaikan Kritik dan Saran Anda ke Kampus PSPP Penerbangan</h4>
 
 <p>Sampaikan kritik dan saran anda kepada kampus PSPP Penerbangan tentang <font color="yellow">pelayanan</font> kampus, fasilitas kampus, dan terutama untuk <font color="yellow"> kritik dan saran tentang metode perkuliahan dan instruktur</font>. Kritik dan saran yang membangun adalah harapan kami.  Kritik dan saran yang anda sampaikan  <font color="yellow">dijaga kerahasaiannya</font> oleh kantor pusat.</p> 
 
<br>

            <form  method="post" id="frm_kritik" name="frm_kritik">
			<div class="form-row"> <div class="col-md-1">Nama Anda :</div> <div class="col-md-9"><input type="text" name="namasiswa" id="namasiswa" value="<? echo $_GET[nama];?>" disabled="disabled"></input>
			</div> </div>
			<div class="form-row"> <div class="col-md-1">Pesan :</div> <div class="col-md-9"><textarea name="kritik" id="kritik" rows="7"></textarea></div> </div>
			<div class="form-row"> <div class="col-md-1"></div> <div class="col-md-4"><button onClick=Simpan() type=button class="btn btn-default">Sampaikan!</button></div> </div>
        </form>

	
	

<br><br><br><br><br>
<!--
 <p>Nullam quis <span class="label">Default</span> risus eget <span class="label label-success">Success</span> urna mollis ornare <span class="label label-warning">Warning</span> 
 vel eu leo. Cum sociis natoque penatibus <span class="label label-important">Important</span> et magnis dis parturient montes, nascetur <span class="label label-info">Info</span> 
 ridiculus mus. Nullam id dolor id nibh ultricies <span class="label label-inverse">Inverse</span> vehicula.</p> <p>Cum sociis <span class="badge">1</span> 
 natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo
 luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p> 
 -->
 
 
 </div></div></div></div>
<?}?>
 