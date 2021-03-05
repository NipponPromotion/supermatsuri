<?php
$title="Partners – Nippon Promotion";
$meta_title="Partners";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="OUR PARTNERS 
THE BEST IN THE BUSINESS    PROJECT PARTNERS   Japan National Tourism Organization 
https://www.jnto.go.jp   
Japan Tourism Ageny";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";

include "top.php";

?>

<div id="sayfabilgisi" adi="about" style="display: none;"></div>
<div class="icerik about">
  <div class="container">
    <div class="about-baslik">
      <?= _ABOUT_MENU_2_HEAD  ?>      <br>
      <span class="about-baslik-iki">
      <?= _PARTNERS_TEXT ?>     </span> </div>
  </div>
</div>
<div class="icerik about-content" style="background: none;">
  <div class="partnerbg">
    <div class="container">
      <div class="about-middle-image partnerss">
        <?= _PROJECT_PARTNERS ?>     </div>
      <div class="partners-tekli">
        <div class="sol-resim"><img src="images/JNTO-logo-600x355.jpg" width="100%" alt="Nippon Promotion Project Partner Japan National Tourism Organization"></div>
        <div class="sag-yazi">
          <div class="baslik"><?= _JNTO ?> </div>
          <a href="https://www.jnto.go.jp/" target="_blank" style="text-decoration: none;">
          <div class="baglanti"><i class="fas fa-globe-americas" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;https://www.jnto.go.jp</div>
          </a>
          <div class="yazi"><?= _JNTO_ACIKLAMA ?> </div>
          <a href="https://www.jnto.go.jp/" target="_blank" style="text-decoration: none;">
          <button class="readmoretop partner-buton">
          <?= _VISIT_JNTO  ?>       <i class="fas fa-arrow-right"></i></button>
          </a> </div>
        <div style="clear: both"></div>
      </div>
      <div class="partners-tekli">
        <div class="sol-resim"><img src="images/80085644_458831308023126_8068808291372761088_n-e1599209390347.jpg" width="100%" alt="Nippon Promotion Project Partner Japan Tourism Agency"></div>
        <div class="sag-yazi">
          <div class="baslik"><?= _JTA ?></div>
          <a href="https://www.mlit.go.jp/kankocho/en/" target="_blank" style="text-decoration: none;">
          <div class="baglanti"><i class="fas fa-globe-americas" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;https://www.mlit.go.jp/kankocho/en/</div>
          </a>
          <div class="yazi"><?= _JTA_ACIKLAMA ?></div>
          <a href="https://www.jnto.go.jp/" target="_blank" style="text-decoration: none;">
          <button class="readmoretop partner-buton">
          <?= _VISIT_JTA ?>        <i class="fas fa-arrow-right"></i></button>
          </a> </div>
        <div style="clear: both"></div>
      </div>
      <div style="clear: both"></div>
    </div>
  </div>
	
	
	
	  <div class="partnerbg">
    <div class="container">
      <div class="about-middle-image partnerss">
  <?= _MEDIA_PARTNERS ?>     </div>
      <div class="partners-tekli">
        <div class="sol-resim"><iframe width="100%" height="500" src="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe></div>
        <div class="sag-yazi">
          <div class="baslik">TWITCH.TV</div>
          <a href="https://www.twitch.tv/supermatsuri" target="_blank" style="text-decoration: none;">
          <div class="baglanti"><i class="fas fa-globe-americas" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;https://www.twitch.tv/supermatsuri</div>
          </a>
          <div class="yazi"> - - - </div>
          <a href="https://www.twitch.tv/supermatsuri" target="_blank">
      <div class="videobutton tw partner-media-button">
         <?= _FOLLOWTWITCH ?> </div>
      </a></div>
        <div style="clear: both"></div>
      </div>
      <div class="partners-tekli">
        <div class="sol-resim"><iframe width="100%" height="500" src="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe></div>
        <div class="sag-yazi">
          <div class="baslik">YOUTUBE</div>
          <a href="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" target="_blank" style="text-decoration: none;">
          <div class="baglanti"><i class="fas fa-globe-americas" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;https://www.youtube.com</div>
          </a>
          <div class="yazi"> - - - </div>
           <a href="https://www.twitch.tv/supermatsuri" target="_blank">
      <div class="videobutton yt partner-media-button">
        <?= _FOLLOWYT ?></div>
      </a></div>
        <div style="clear: both"></div>
      </div>
      <div style="clear: both"></div>
    </div>
  </div>
	
	
	
</div>

<?php
include "bottom.php";

?>
