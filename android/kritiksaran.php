
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 

 <div class="panel-body">
<? if ($_GET[pesan]=="sukses"){?>
<div class="callout callout-warning no-margin bring-up">
            <h4>Pesan anda sudah terkirim!</h4>
           Terima kasih atas kritik dan saran anda.   Kritik dan saran yang membangun adalah harapan kami. Silakan cek pesan anda dibawah form isian kritik dan saran. </div>
 <?} else{?>
<div class="callout callout-allert no-margin bring-up">
            <h4>Kritik & Saran!</h4>
           Sampaikan kritik dan saran anda kepada kampus PSPP Penerbangan melalui halaman ini. Kritik dan saran yang membangun adalah harapan kami.  <br><br>
 </div>
 <? } ?>
 
 
   <div class="box-body">
 
<iframe src="https://www.pspp-integrated.com/23n2i33h2b423/system/kritiksaran_portable.php?&nama=<? echo $_SESSION[ps_nama]." - ".$_SESSION[ps_kampus];?>" width="100%" height="700px" border="0"></iframe>

</div>
</div>