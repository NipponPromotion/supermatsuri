<?php
$title="Live Streams – Nippon Promotion";
$meta_title="Live Streams";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="LIVE STREAMS CHECK OUR STREAMS ON TWITCH, FACEBOOK & YOUTUBE           YOUTUBE LIVESTREAM    TWITCH LIVESTREAM    
FACEBOOK LIVESTREAM";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";



include "top.php";

?>
<div id="sayfabilgisi" adi="watch" style="display: none;"></div>
<div class="icerik stream">
  <div class="container">
    <div class="stream-video-channel">
      <div class="videobaslik">
        <?= _LIVESTREAM_TW ?>
      </div>
      <a href="https://www.twitch.tv/supermatsuri" target="_blank">
      <div class="videobutton tw">
        <?= _FOLLOWTWITCH ?>
        </div>
      </a>
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
	  
	   <div class="stream-video-channel">
      <div class="videobaslik">
        <?= _LIVESTREAM_FB ?>
      </div>
      <a href="https://www.twitch.tv/supermatsuri" target="_blank">
      <div class="videobutton fb">
        <?= _FOLLOWFB ?>
        </div>
      </a>
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
	  
	   <div class="stream-video-channel">
      <div class="videobaslik">
        <?= _LIVESTREAM_YT ?>
      </div>
      <a href="https://www.twitch.tv/supermatsuri" target="_blank">
      <div class="videobutton yt">
        <?= _FOLLOWYT ?>
       </div>
      </a>
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/BwZM0SPA7ww?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
  </div>
</div>
<?php
include "bottom.php";

?>
