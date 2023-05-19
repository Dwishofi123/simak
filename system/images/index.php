<div align="center">
<style type="text/css">
<!--
body,td,th {
	color: #FF0000;
}
body {
	background-color: #000000;
}
-->
</style>
<title>.:: Ilegal Activity is Detected! ::.</title>


<?php


$ipx = $_SERVER['REMOTE_ADDR'];
echo " <h1>WARNING! ". $ipx ."</h1>";
echo "<h2>Illegal Activity is Detected! Your IP Address is Saved in Our Database! Go NOW or We Kick You!<br>IP Ente sudah kami simpan dan akan kami laporkan ke POLISI!</h2>";
echo "Your IP address : " . $ipx;
echo "<br>Your hostname : ". gethostbyaddr($ipx) ;


function getLnt($zip){
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}

$val = getLnt('90001');
 echo "<br>Latitude: ".$val['lat']." , ";
 echo "Longitude: ".$val['lng']."<br>";
 
 
 

class geoPlugin {
	
	//the geoPlugin server
	var $host = 'http://www.geoplugin.net/php.gp?ip={IP}&base_currency={CURRENCY}';
		
	//the default base currency
	var $currency = 'USD';
	
	//initiate the geoPlugin vars
	var $ip = null;
	var $city = null;
	var $region = null;
	var $areaCode = null;
	var $dmaCode = null;
	var $countryCode = null;
	var $countryName = null;
	var $continentCode = null;
	var $latitude = null;
	var $longitude = null;
	var $currencyCode = null;
	var $currencySymbol = null;
	var $currencyConverter = null;
	
	function geoPlugin() {

	}
	
	function locate($ip = null) {
		
		global $_SERVER;
		
		if ( is_null( $ip ) ) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		$host = str_replace( '{IP}', $ip, $this->host );
		$host = str_replace( '{CURRENCY}', $this->currency, $host );
		
		$data = array();
		
		$response = $this->fetch($host);
		
		$data = unserialize($response);
		
		//set the geoPlugin vars
		$this->ip = $ip;
		$this->city = $data['geoplugin_city'];
		$this->region = $data['geoplugin_region'];
		$this->areaCode = $data['geoplugin_areaCode'];
		$this->dmaCode = $data['geoplugin_dmaCode'];
		$this->countryCode = $data['geoplugin_countryCode'];
		$this->countryName = $data['geoplugin_countryName'];
		$this->continentCode = $data['geoplugin_continentCode'];
		$this->latitude = $data['geoplugin_latitude'];
		$this->longitude = $data['geoplugin_longitude'];
		$this->currencyCode = $data['geoplugin_currencyCode'];
		$this->currencySymbol = $data['geoplugin_currencySymbol'];
		$this->currencyConverter = $data['geoplugin_currencyConverter'];
		
	}
	
	function fetch($host) {

		if ( function_exists('curl_init') ) {
						
			//use cURL to fetch data
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.0');
			$response = curl_exec($ch);
			curl_close ($ch);
			
		} else if ( ini_get('allow_url_fopen') ) {
			
			//fall back to fopen()
			$response = file_get_contents($host, 'r');
			
		} else {

			trigger_error ('geoPlugin class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
			return;
		
		}
		
		return $response;
	}
	
	function convert($amount, $float=2, $symbol=true) {
		
		//easily convert amounts to geolocated currency.
		if ( !is_numeric($this->currencyConverter) || $this->currencyConverter == 0 ) {
			trigger_error('geoPlugin class Notice: currencyConverter has no value.', E_USER_NOTICE);
			return $amount;
		}
		if ( !is_numeric($amount) ) {
			trigger_error ('geoPlugin class Warning: The amount passed to geoPlugin::convert is not numeric.', E_USER_WARNING);
			return $amount;
		}
		if ( $symbol === true ) {
			return $this->currencySymbol . round( ($amount * $this->currencyConverter), $float );
		} else {
			return round( ($amount * $this->currencyConverter), $float );
		}
	}
	
	function nearby($radius=10, $limit=null) {

		if ( !is_numeric($this->latitude) || !is_numeric($this->longitude) ) {
			trigger_error ('geoPlugin class Warning: Incorrect latitude or longitude values.', E_USER_NOTICE);
			return array( array() );
		}
		
		$host = "http://www.geoplugin.net/extras/nearby.gp?lat=" . $this->latitude . "&long=" . $this->longitude . "&radius={$radius}";
		
		if ( is_numeric($limit) )
			$host .= "&limit={$limit}";
			
		return unserialize( $this->fetch($host) );

	}

	
}


$geoplugin = new geoPlugin();

/* 
Notes:

The default base currency is USD (see http://www.geoplugin.com/webservices:currency ).
You can change this before the call to geoPlugin::locate with eg:
$geoplugin->currency = 'EUR';

The default IP to lookup is $_SERVER['REMOTE_ADDR']
You can lookup a specific IP address, by entering the IP in the call to geoPlugin::locate
eg
$geoplugin->locate('209.85.171.100');

*/

//locate the IP
$geoplugin->locate();

echo 
	"Country Name: {$geoplugin->countryName} , \n".
	"Country Code: {$geoplugin->countryCode} , \n".
	"Area Code: {$geoplugin->areaCode} , \n".
	"DMA Code: {$geoplugin->dmaCode} , \n".
	
	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";


$browserAgent = $_SERVER['HTTP_USER_AGENT'];
echo $browserAgent;



?>

<?php
function getip() {
if (isSet($_SERVER)) {
if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) {
$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) {
$realip = $_SERVER["HTTP_CLIENT_IP"];
} else {
$realip = $_SERVER["REMOTE_ADDR"];
}
} else {
if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
$realip = getenv( 'HTTP_X_FORWARDED_FOR' );
} elseif ( getenv( 'HTTP_CLIENT_IP' ) ) {
$realip = getenv( 'HTTP_CLIENT_IP' );
} else {
$realip = getenv( 'REMOTE_ADDR' );
}
}
return $realip;
}

//print out the ip and browser information

print getip();
print $_SERVER['HTTP_USER_AGENT'];

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

echo $hostname;

?>
<br>

Your Mac Address : </font><font color="yellow">
<?php
    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
    if($_IP_ADDRESS == $_IP_SERVER)
    {
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
        echo $_HASIL;  
    } else {
        $_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
        ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
        echo "IP Anda : ".$_IP_ADDRESS."
        MAC ADDRESS Anda : ".$_HASIL;
    }
?> </font><font color="red">(stored in our database!)</font>
</div>
