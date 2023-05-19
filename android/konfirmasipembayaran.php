<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
 
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
 <? session_start();
 if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Konfirmasi Pembayaran</h3>
    		  </div> 
			 
			  <div class="panel-body">			 
				 <iframe src="konfirmasipembayaran_iframe.php" width="100%" height="100%" border=1></iframe>
				    		  </div>
			
    	</div>
		
<?}?>
		