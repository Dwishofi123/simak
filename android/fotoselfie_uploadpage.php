
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
  
  <meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <? session_start();

if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";?>

<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Upload Foto Selfie Baru</h3>
				  

    		  </div> 

<iframe src="fotoselfie_iframe.php" width="100%" height="100%" border=1></iframe>
</div><?}?>