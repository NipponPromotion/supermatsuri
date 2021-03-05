<?php
$title="About – Nippon Promotion";
$meta_title="About";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="ABOUT US 
What is Nippon Promotion Project?     
WHO ARE WE?  
WHAT DO WE STAND FOR? ";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";
include "top.php";

?>
<div id="sayfabilgisi" adi="about" style="display: none;"></div>
<div class="icerik about">
  <div class="container">
    <div class="about-baslik"> <?= _ABOUT_US ?><br />
      <span class="about-baslik-iki"><?= _ABOUT_US_TEXT ?></span> </div>
  </div>
</div>
<div class="icerik about-content">
  <div class="container">
    <div class="about-middle-image">
      <div class="about-logo"> <img src="images/npp-world-logo.png" width="100%" alt="Nippon Promotion Project"> </div>
      <?= _WHO_ARE_WE ?> </div>
	  
	  <div class="about-dortlu">
	  <div class="about-yazi-baslik"><?= _ABOUT_1_HEAD ?></div>
		  <div class="about-yazi"><?= _ABOUT_1 ?></div>
	  </div>
	  
	  <div class="about-dortlu">
	  <div class="about-yazi-baslik"><?= _ABOUT_2_HEAD ?></div>
		  <div class="about-yazi"><?= _ABOUT_2 ?></div>
	  </div>
	  
	  <div class="about-dortlu">
	  <div class="about-yazi-baslik"><?= _ABOUT_3_HEAD ?></div>
		  <div class="about-yazi"><?= _ABOUT_3 ?></div>
	  </div>
	  
	  <div class="about-dortlu">
	  <div class="about-yazi-baslik"><?= _ABOUT_4_HEAD ?></div>
		  <div class="about-yazi"><?= _ABOUT_4 ?></div>
	  </div>
	  
	  <div style="clear: both"></div>
	</div>
</div>
<?php
include "bottom.php";

?>
