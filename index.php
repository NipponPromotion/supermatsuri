<?php
$title="Nippon Promotion";
$meta_title="Nippon Promotion";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="Nippon promotion Project 2020";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";
include "top.php";
require_once "config.php";



?>

<div id="deprempopup">
<div class="popupclose" onClick="popupkapat()">X</div>
2020年（令和2年）10月30日、トルコ・イズミル県南部のエーゲ海を震源地とする地震を受けて、日本とトルコの友好の原点である和歌山から被災者を支援するため、和歌山県及び県内30市町村が一体となって義援金の募集をします。
<a href="donate.php"><div class="donatebuton">DONATE PAGE</div></a>
</div>

<div id="sayfabilgisi" adi="home" style="display: none;"></div>
<div class="icerik top">
  <div class="iceriktopbaslik"><?= _NIPPON_FEST?></div>
	  <div class="iceriktopyazi"> 29 <?= _NOVEMBER?> 2020 
  </div>
  <div class="iceriktopyazi"> <span style="font-family: 'Gugi', cursive;"><?= _NIPPON_FEST?></span>
    <?= _TOP_TEXT ?>
  </div>
  <div class="iceriktopbutton">
    <button class="readmoretop" id="readmoreanabuton">
    <?= _READ_MORE ?>
    <i class="fas fa-arrow-right"></i></button>
  </div>
  <div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<div class="icerik ikinci">
  <div class="ikinciresimler"><img src="images/Npp-World-People1.jpg" width="100%" class="ikipeopleresimler" loading="lazy"/>
	  <div class="ikinciresimlogosu"><img src="images/Logo1-300x150.png" width="100%"></div>
    <div class="imgoverlay"></div>
  </div>
  <div class="ikinciresimler"><img src="images/Npp-World-People2.jpg" width="100%" class="ikipeopleresimler" loading="lazy"/>
	   <div class="ikinciresimlogosu"><img src="images/Logo2-300x150.png" width="100%"></div>
    <div class="imgoverlay"></div>
  </div>
  <div class="ikinciresimler"><img src="images/Npp-World-People3.jpg" width="100%" class="ikipeopleresimler" loading="lazy"/>
	   <div class="ikinciresimlogosu"><img src="images/Logo3-300x150.png" width="100%"></div>
    <div class="imgoverlay"></div>
  </div>
  <div class="ikinciresimler"><img src="images/Npp-World-People4.jpg" width="100%" class="ikipeopleresimler" loading="lazy"/>
	   <div class="ikinciresimlogosu"><img src="images/Logo4-300x150.png" width="100%"></div>
    <div class="imgoverlay"></div>
  </div>
  <div class="ikinciresimler"><img src="images/Npp-World-People5.jpg" width="100%" class="ikipeopleresimler" loading="lazy"/>
	   <div class="ikinciresimlogosu"><img src="images/Logo5-300x150.png" width="100%"></div>
    <div class="imgoverlay"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<div class="icerik ucuncu">
  <div class="ucuncuvideo">
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
  <div style="clear:both;"></div>
</div>
<div class="icerik dorduncu" id="actenpart">
  <div class="dorduncubaslik">
    <p class="dortbaslik">
      <?= _PARTICIPANT ?>
    </p>
  </div>
  <div class="dortresimtutucu" >

	  
	  
	  
	  <?php
	  
	  
	  // Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	  
	  
	  
 $sql = "SELECT * FROM performers order by tarih,saat asc";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
$gorselyolu=$row["gorsel"];

		$gorseladi=substr($gorselyolu, 0, -4);

		$newgorselyolu=$gorseladi."-rsz.jpg";

		$monthNum = date("m",strtotime($row[ "tarih"]));
		$dayNum=date("d",strtotime($row[ "tarih"]));
		$saat=date('g:ia', strtotime($row[ "saat"]));

$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$aylar = array(" ", _JANUARY, _FEBRUARY,_MARCH,_APRIL,_MAY,_JUNE,_JULY,_AUGUST,_SEPTEMBER,_OCTOBER,_NOVEMBER,_DECEMBER);
$monthName = $dateObj->format('F'); // March
		
$isim=str_replace('ş','s',str_replace('ü','u',strtolower(str_replace(' ', '_', $row[ "perf_name" ]))));		
		
		
		
		echo "
		
		<a href='event/".$isim."'>
    <div class='dortresimuclu'>
      <div class='dortresim' style='background-image:url(";
			echo $newgorselyolu;
				echo ")'></div>
      <div class='dortyazi'>
        <div class='dortyazibaslik'>".$row[ "perf_name"]."</div>
        <div class='dortyaziyazi'>".$aylar[$monthNum]." ".$dayNum." @ ".$saat."</div>
      </div>
    </div>
		</a>
		
		";
		
		
		
		
		
	}
}
	  
	  $conn->close();
	  
	  
	  ?>
	  
	  
	  
	
	  
	  
 

    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<div class="icerik besinci">
  <div class="dortresimtutucu">
    <div class="besyarim">
      <div class="besyarimbaslik egik">
        <?= _EVENT_SCHEDULE ?>
      </div>
      <div class="bessag">
        <div class="schedulekutu">
          <div class="schsatir1"><i class="far fa-calendar-alt"></i></div>
          <div class="schsatir2 font-weight-bolder">29 November 2020</div>
          <div class="schsatir2 bos font-weight-bolder font-italic">Time: 4:00pm</div>
          <div class="schsatir2 bos font-weight-bolder">Opening Ceremony</div>
          <div class="schsatir2 bos">Izmir City & Kanagawa Pref.</div>
          <div style="clear:both;"></div>
        </div>
		  
		  
		  
		  
		  
        <div class="schedulekutu">
          <div class="schsatir1"><i class="far fa-calendar-alt"></i></div>
          <div class="schsatir2 font-weight-bolder">29 November 2020</div>
          <div class="schsatir2 bos font-weight-bolder font-italic">Time: 4:30pm</div>
          <div class="schsatir2 bos font-weight-bolder">Concert</div>
          <div class="schsatir2 bos">Atsuko SUETOMI & Emiko KARAYILMAZ  </div>
          <div style="clear:both;"></div>
        </div>
		  

		  <?php 
		  
		 	  // Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	  
	  
	  
 $sql = "SELECT * FROM performers order by tarih,saat asc";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
$gorselyolu=$row["gorsel"];
		$monthNum = date("m",strtotime($row[ "tarih"]));
		$dayNum=date("d",strtotime($row[ "tarih"]));
		$yearNum=date("y",strtotime($row[ "tarih"]));
		$saat=date('g:ia', strtotime($row[ "saat"]));
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
		
		
		
		
		
		echo "
		<a href='event.php?event_id=".$row[ "id"]."'>
  <div class='schedulekutu'>
          <div class='schsatir1'><i class='far fa-calendar-alt'></i></div>
          <div class='schsatir2 font-weight-bolder'>".$dayNum." ".$monthName." 20".$yearNum."</div>
          <div class='schsatir2 bos font-weight-bolder font-italic'>Time:".$saat."</div>
          <div class='schsatir2 bos font-weight-bolder'>Event</div>
          <div class='schsatir2 bos'>".$row[ "perf_name"]."(".$row[ "perf_spec"].")</div>
          <div style='clear:both;'></div>
        </div>
		</a>
		";
		
		
		
		
		
	}
}
	  
	  $conn->close();
	   
		  
		  
		  
		  ?>
		  
		  
		  

      </div>
    </div>
    <div class="besyarim">
      <div class="besyarimbaslik">
        <?= _OUR_PARTNERS ?>
      </div>
      <div class="partnerkutu"> <a href="https://www.mlit.go.jp/kankocho/" target="_blank"> <img src="images/partner-japan-tourism-agency.png" width="100%" class="partnerresimler"/> </a> </div>
      <div class="partnerkutu"> <a href="http://www.kantei.go.jp/jp/singi/tokyo2020_suishin_honbu/beyond2020/" target="_blank"> <img src="images/partner-beyond-2020.png" width="100%" class="partnerresimler"/> </a> </div>
      <div class="partnerkutu"> <a href="https://www.jnto.go.jp/" target="_blank"> <img src="images/partner-japan-national-toursim-organization.png" width="100%" class="partnerresimler"/> </a> </div>
      <div class="partnerkutu"> <a href="https://www.jata-net.or.jp/" target="_blank"> <img src="images/partner-jata.png" width="100%" class="partnerresimler"/> </a> </div>
      <div class="partnerkutu"> <a href="https://www.izmir.bel.tr/" target="_blank"> <img src="images/partner-izmir-buyuksehir-belediyesi.png" width="100%" class="partnerresimler"/> </a> </div>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<div class="icerik">
  <div class="container">
    <div class="icerik-alti-sol">
      <div class="besyarimbaslik anahaber">
        <?= _LATEST_NEWS ?>
      </div>
    <a href="news.php">  <div class="haber-read-more">
        <button class="readmoretop haberler-read-more-button">
        <?= _READ_MORE ?>
        <i class="fas fa-book"></i></button>
      </div></a>
		
		
				  <?php 
		  
		 	  // Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	  
	  
	  
 $sql = "SELECT * FROM news order by eklenme_zamani desc";
$result = $conn->query( $sql );
		  $sayac=0;

if ( $result->num_rows > 0 ) {
    // output data of each row
	
    while ( $row = $result->fetch_assoc() ) {
		if ($sayac<4){
$gorselyolu=$row["gorsel"];
		$monthNum = date("m",strtotime($row[ "eklenme_zamani"]));
		$dayNum=date("d",strtotime($row[ "eklenme_zamani"]));
		$yearNum=date("y",strtotime($row[ "eklenme_zamani"]));
			
			
					$kimdeyiz=$row[ "id"];

	  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='$kimdil'";
$resultcev = $conn->query( $sql );
	  if ( $resultcev->num_rows > 0 ) {
		  while ( $rowcev = $resultcev->fetch_assoc() ) {

			  $yazi=mb_substr($rowcev[ "metin"], 0, 90);
			  $baslik=$rowcev[ "baslik"];
		  
	  }}
		else
		{
			
				  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='en'";
$resultcev = $conn->query( $sql );

			while ( $rowcev = $resultcev->fetch_assoc() ) {
		  $yazi=mb_substr($rowcev[ "metin"], 0, 90);
				$baslik=$rowcev[ "baslik"];
			}
	 
			
			
		}
			
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
		
		
		
		
		
		echo "
  	<a href='news.php?news_id=".$row[ "id"]."'>
      <div class='haberler-ana-sayfa'>
        <div class='haberler-ana-resim'><img src='".$row[ "gorsel"]."' width='100%'></div>
        <div class='haberler-ana-baslik'>".$baslik."</div>
        <div class='haberler-ana-tarih'>".$monthName." ".$dayNum.",".$yearNum."20|</div>
        <div class='haberler-ana-yazi'>".$yazi."...</div>
      </div>
		
		</a>
		
		";
		
		
		$sayac++;
		
	}
	}
}
	  
	  $conn->close();
	   
		  
		  
		  
		  ?>
		  
		
		
		
		

		<div style="clear:both;"></div>
    </div>
    <div class="icerik-alti-sag">
      <div class="besyarimbaslik anahaber">
        <?= _ABOUT_MENU_3_HEAD ?>
      </div>
      <a href="https://telenet.co.jp/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/npp-world-sponsor-tele-net.png" width="100%"></div>
      </a> <a href="https://www.japonyapostasi.com/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/npp-world-sponsor-japonya-postasi.png" width="100%"></div>
      </a> <a href="http://aiwafuku.com/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/npp-world-sponsor-uc.png" width="100%"></div>
      </a>
	  
	  
		<a href="https://www.kandamyoujin.or.jp/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/Kanda-Myojin-400x48.png" width="100%"></div>
      </a>
		
		<a href="https://a-production.jp/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/a-production-logo-200x200.png" width="100%"></div>
      </a>
		
		<a href="https://inpro3.com/" target="_blank">
      <div class="sponsor-kutusu"><img src="images/inprologo-400x389.png" width="100%"></div>
      </a>
	  
	  
	  
	  </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>

<script type="text/javascript">

$("#readmoreanabuton").click(function() {
    $('html, body').animate({
        scrollTop: $("#actenpart").offset().top
    }, 2000);
});


	
function popupkapat(){
	
	$('#deprempopup').css('display','none');
	
}
	
	
</script>


<?php
	
	
	
if ($kimdil=="ja")
	{echo "<script type='text/javascript'>
	$('#topribbon').css('display','block');
	$('#topRedBar').css('margin-top','20px');
	$('#deprempopup').css('display','block');
	</script>";}
	
	
include "bottom.php";

?>
