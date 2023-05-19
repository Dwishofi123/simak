<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>
<?php include "koneksi.php"; ?>


<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="mail-profile">
    	 		<div class="mail-pic">
    	 			<img src="img/mail.png" width="50" alt="">
    	 		</div>
    	 		<div class="mailer-name"> 			
    	 				<h5>Pesan Masuk</h5>  	 				
    	 			     <?php  $sqlnya = "select * from private_message where tujuan = 3 order by datetime desc";
			$kuerine = mysql_query($sqlnya); $jumlah = mysql_num_rows($kuerine); ?> Total <?php echo $jumlah;?> Pesan
    	 		</div>
    	 	    <div class="clearfix"> </div>
    	 	</div>
			<?php $sqlnya = "select * from private_message where tujuan = '".$_SESSION['ps_no']."' order by datetime desc";
			$kuerine = mysql_query($sqlnya);
			?>
			<table class="table tab-border">
			<tbody>
	                        <tr class="unread checked">
	                            <td class="hidden-xs">
	                                <input class="checkbox" type="checkbox">
	                            </td>
	                            <td class="hidden-xs">
	                                <i class="fa fa-star icon-state-warning"> </i>
	                            </td>
	                            <td>
	                                No
	                            </td>
	                            <td>
	                                Pesan
	                            </td>
	                            <td>
	                            </td>
	                            <td>
	                                Tanggal
	                            </td>
	                        </tr>
							
							<?php $nomornya = 1; while ($tampilke = mysql_fetch_array($kuerine)){?>
							 <tr class="unread checked">
	                            <td class="hidden-xs">
	                                <input class="checkbox" type="checkbox">
	                            </td>
	                            <td class="hidden-xs">
	                                <i class="fa fa-star icon-state-warning"> </i>
	                            </td>
	                            <?php echo "<td>".$nomornya."
	                               
	                            </td>
	                            <td>
	                               ".$tampilke['message']."
	                            <td>
	                            </td>
	                            <td>
	                               ".$tampilke['datetime']."
	                            </td>
	                        </tr>"; $nomornya++ ;}?>
	                        
	                    </tbody></table>
						
<?php							

$sql = mysql_query("update private_message set status_read = 'YES'		where tujuan = '".$_SESSION['ps_no']."'");
?>