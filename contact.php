<?php
$title="Contact – Nippon Promotion";
$meta_title="Contact";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="Contact Us Get in touch Nippon Promotion Project";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";
include "top.php";

?>
<div id="sayfabilgisi" adi="contact" style="display: none;"></div>
<div class="icerik about">
  <div class="container">
    <div class="about-baslik">
      <?= _CONTACT_US ?>
      <br />
      <span class="about-baslik-iki">
      <?= _CONTACT_US_TEXT ?>
      </span> </div>
  </div>
</div>
<div class="icerik about-content">
  <div class="container">
    <div class="contact-sol">
      <div class="contact-baslik"><?= _CONTACT_US ?></div>
      <div class="contact-yazi"><?= _DEAR_VISITOR ?><br />
        <br />
       <?= _CONTACT_DESC ?></div>
		
		<form action="send_mail.php" method="post">
		<label class="contact-label"><?= _YOUR_NAME ?><br />

		<input type="text" id="adi" class="contact-input" name="name"> 
		</label>
		
		<label class="contact-label"><?= _YOUR_E_MAIL ?><br />

		<input type="text" id="email" class="contact-input" name="email">
		</label>
		
		<label class="contact-label"><?= _YOUR_SUBJECT ?><br />

		<input type="text" id="subject" class="contact-input" name="subject">
		</label>
		
		<label class="contact-label"><?= _YOUR_MESSAGE ?><br />
<textarea id="message" class="contact-input" name="message"></textarea>

		</label>
		
		<button type="submit" class="contact-send-button"><?= _SEND ?></button>
		</form>
      <div style="clear: both"></div>
    </div>
    <div class="contact-sag">
	  <div class="contact-baslik"><?= _BUSINESS_TIME ?></div>
		<div class="contact-baslik"><?= _JAPAN_TIME ?></div>
		<div class="contact-yazi">
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _SUNDAY ?> – <strong><?= _HOLIDAY ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _MONDAY ?>  – <strong>10:00<?= _AM ?> <?= _TIL ?> 19:00<?= _PM ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _TUESDAY ?> – <strong>10:00<?= _AM ?> <?= _TIL ?> 19:00<?= _PM ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _WEDNESDAY ?> – <strong>10:00<?= _AM ?> <?= _TIL ?> 19:00<?= _PM ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _THURSDAY ?> – <strong>10:00<?= _AM ?> <?= _TIL ?> 19:00<?= _PM ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _FRIDAY ?> – <strong>10:00<?= _AM ?> <?= _TIL ?> 19:00<?= _PM ?></strong><br />
		<i class="far fa-clock" style="color: red;"></i>&nbsp;&nbsp;&nbsp;<?= _SATURDAY ?> – <strong>12:00<?= _AM ?> <?= _TIL ?> 18:00<?= _PM ?></strong><br />
		

		
		
		</div>
		
		<div class="contact-baslik">Email</div>
	    <a href="mailto:npp@supermatsuri.com"> 
	  <div class="contact-eposta"><i class="fab fa-telegram-plane"></i>&nbsp;&nbsp;npp@supermatsuri.com</div>
	 </a>
		
		
		<div class="contact-baslik"><?= _TELEPHONE ?></div>
	   <a href="https://wa.me/819035133799" target="_blank">
	  <div class="contact-eposta"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;+81 90-3513-3799</div>
	 </a>
		
	  
	  </div>
    <div style="clear: both"></div>
  </div>
</div>


<script type="text/javascript">

$(document).ready(function () {
	
	
	var durum = getUrlParameter('success');

	if(durum=="true")
		{
			
			alert("<?= _CONTACT_FORM_ALERT_OK ?>");
		}
	
	if(durum=="false")
		{
			
			alert("<?= _CONTACT_FORM_ALERT_FALSE ?>");
		}
	
});


</script>


<?php
include "bottom.php";

?>
