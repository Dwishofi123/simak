<?php

include "koneksi.php";

?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
 
 
 
 			
				
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Berita Terkini</h3>
    		  </div> 

			  <div class="panel-body">
			  


					<?php $sq = mysql_query("select * from content where grup = 'berita' and pub = 'true' and id = '".$_GET['id']."' ");
					$tp = mysql_fetch_array($sq);
					?>
						<h4><?php echo "$tp[judul]";?></h4>
					
					<br><br><?php echo "$tp[content]";?>
           
<?php

getFeed("http://pspp-penerbangan.ac.id/feed");

function getFeed($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
       
    echo "<br>";
     
    foreach($x->channel->item as $entry) {
        echo "<a href='$entry->link' target='blank' title='$entry->title'>" . $entry->title . "</a><br>Date : ".$entry->pubDate."<br>". $entry->description . "... <br><br>";
    }
    echo "<br><bR>";
}

?>

	
    <div class="product-block">
    	<div class="pro-head">
    		<h3><br>Berita Lainnya</h3>
    	</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		

            <div class="mdl-grid gallery masonry"> <!-- grid container -->
              <div class="mdl-cell mdl-cell--6-col"> <!-- left column -->
                <?php 
				$sql = mysql_query("select * from content where grup = 'berita' and pub = 'true' order by id desc ");
				$a=0;
				while($t = mysql_fetch_array($sql)){
										if  ($t['img'] == ""){
										$gambarnya="images/user.png";
										}else {$gambarnya=$t['img'];} 
										
				
				$a=$a+1; if($a % 2 == 0)	{// filter genap ganjil	
				echo "<a href='index.php?page=berita&id=$t[id]' title='$t[judul]'><img src='$gambarnya' alt=''/>$t[judul]</a>";}
				}?>				  			

              </div>
              <div class="mdl-cell mdl-cell--6-col"> <!-- right column -->
				<?php 
				$sql = mysql_query("select * from content where grup = 'berita' and pub = 'true'  order by id desc ");
				$a=0;
				while($t = mysql_fetch_array($sql)){
										if  ($t['img'] == ""){
										$gambarnya="images/user.png";
										}else {$gambarnya=$t['img'];} 
										
				
				$a=$a+1; if($a % 2 <> 0)	{// filter genap ganjil	
				echo "<a href='index.php?page=berita&id=$t[id]'  title='$t[judul]'><img src='$gambarnya' alt=''/>$t[judul]</a>";}
				}?>				  

              </div>
            </div>


<br><br>



</div>
</div>
</div>
