<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>

<?php include "koneksi.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Videos</h3>
    		  </div> 
			  
			  
			  
    	<main class="mdl-layout__content mdl-color--white">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1"> <!-- first tab -->

		
          <div class="player-featured">  <!-- most watched -->
            <p><strong><? echo $_GET[title];?></strong></p>
            <iframe style="padding: 16px 0;height:250px;" src="https://www.youtube.com/embed/<? echo $_GET[item];?>" allowfullscreen></iframe>
          </div>  

		
          <div class="player-featured"> <!-- featured cards -->
		   <div class="mdl-grid">
		<? 
		$sqlnya = "select * from video order by RAND()"; $ker = mysql_query($sqlnya); 
		while($vid = mysql_fetch_array($ker)){?>
           
              <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-card mdl-shadow--2dp">
                  <a href="index.php?page=video&item=<? echo $vid['ytv'];?>&title=<? echo $vid['title'];?>">
				  <img src="https://i.ytimg.com/vi/<? echo $vid['ytv'];?>/maxresdefault.jpg" alt="" />
                  <span><strong><? echo $vid['title'];?></strong></span>
                 </a>
                </div>
              </div>           
            
			
		<?}?>
			</div>
          </div>
		  
		  
         <!-- fixed bottom player  <div class="playing-now mdl-shadow--8dp"> 
            <img src="img/face.jpg" alt="" />
            <span><strong>John Lee</strong> / Wave
            <button class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">pause</i>
            </button>
            </span>
          </div>-->

        </section>
		</main>
			
			
			  
    	</div>