<?php

$title="Sponsors – Nippon Promotion";
$meta_title="Sponsors – Nippon Promotion";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="OUR SPONSORS 
THE ORGANISATIONS THAT MAKE US TICK Telenet Co.Ltd Japonya Postasi Aiwafuku Kandamyoujin A Production Inpro";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";


include "top.php";

?>
<div id="sayfabilgisi" adi="about" style="display: none;"></div>
<div class="icerik about">
  <div class="container">
    <div class="about-baslik"> <?= _SPONSORS_BASLIK ?><br />
      <span class="about-baslik-iki"><?= _SPONSORS_TEXT ?></span> </div>
  </div>
</div>
<div class="icerik about-content" style="background: none;">
  <div class="container">

	<a href="https://telenet.co.jp/" target="_blank">
<div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/npp-world-sponsor-tele-net.png" width="100%" alt="Nippon Promotion Project Sponsor TeleNet"></div>
	  <div class="sponsor-sayfa-kutu-baslik">TELENET</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _TELENET_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a>  
	  
	  <a href="https://www.japonyapostasi.com/" target="_blank">
	  <div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/npp-world-sponsor-japonya-postasi.png" width="100%" alt="Nippon Promotion Project Sponsor Japonya Postasi"></div>
	  <div class="sponsor-sayfa-kutu-baslik">JAPONYA POSTASI</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _JPOST_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a> 
	  
		  <a href="http://aiwafuku.com/" target="_blank">
	  	  <div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/npp-world-sponsor-uc.png" width="100%" alt="Nippon Promotion Project Sponsor Aiwafuku"></div>
	  <div class="sponsor-sayfa-kutu-baslik">AIWAFUKU</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _AIWAFUKU_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a> 
	  
	  	  
			  <a href="https://www.kandamyoujin.or.jp/" target="_blank">
	  	  <div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/Kanda-Myojin-400x48.png" width="100%" alt="Nippon Promotion Project Sponsor Kandamyoujin"></div>
	  <div class="sponsor-sayfa-kutu-baslik">KANDAMYOUJIN</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _KANDAMYOUJIN_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a> 
	  
	  
	  	  <a href="https://a-production.jp/" target="_blank">
	  	  <div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/a-production-logo-200x200.png" width="100%" alt="Nippon Promotion Project Sponsor A Production"></div>
	  <div class="sponsor-sayfa-kutu-baslik">A PRODUCTION</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _APRODUCTION_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a> 
	  
	  
	    <a href="https://inpro3.com/" target="_blank">
	  	  <div class="sponsor-sayfa-kutu">
	  <div class="sponsor-sayfa-kutu-resim"><img src="images/inprologo-400x389.png" width="100%" alt="Nippon Promotion Project Sponsor Inpro"></div>
	  <div class="sponsor-sayfa-kutu-baslik">INPRO</div>
	  <div class="sponsor-sayfa-kutu-yazi"><?= _INPRO_ACIKLAMA ?></div>
	<div style="clear: both"></div>
	  </div>
	  </a> 
	  
	  
	  
	  <div style="clear: both"></div>
	</div>
</div>
<?php
include "bottom.php";

?>
