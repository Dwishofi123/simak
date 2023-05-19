<?php
   $db = new mysqli('localhost', 'root' ,'', 'e-sids-web');
	//include "system/system/konek.php";
	if(!$db) {
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $db->query("SELECT npsn,nama_sma,alamat,kota FROM database_sekolah WHERE kota LIKE '%$queryString%' order by nama_sma desc");
				
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->npsn).'\'); fill2(\''.addslashes($result->nama_sma).'\');">'.$result->nama_sma.'&nbsp;&nbsp;'.$result->alamat.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>