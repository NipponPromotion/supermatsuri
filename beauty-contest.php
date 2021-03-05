<?php
include "top.php";
?>
<div id="sayfabilgisi" adi="beauty-contest" style="display: none;"></div>
<div class="icerik beauty-contest">
  <div class="container">
    <div class="beauty-baslik-buyuk"><?= _YUKATA_BEAUTY_CONTEST ?></div>
    <div class="beauty-baslik-kucuk"><?= _OUR_BEAUTY ?></div>
	<a href="welcome.php?from=beauty-contest">  <div class="be-competitor-button"><?= _BE_A_COMPETITOR ?>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></div></a>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php

require_once "config.php";


$oykullandiklari=[];



$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}

$sql = "SELECT * FROM votes where voter_user_id=".$_SESSION[ "id" ];
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {

	$esitmi=1;
}

$conn->close();





// Create connection
$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}

$sql = "SELECT b.fk_users_id as fk_users_id,
			   b.gorsel as gorsel,
			   u.name as name,
			   u.surname as surname,
			   b.id as bid,
			   u.id as uid,
			   b.boy as boy,
			   b.kilo as kilo,
			   b.beden as beden,
			   b.facebook as facebook,
			   b.instagram as instagram,
			   b.twitch as twitch,
			   b.youtube as youtube,
			   b.twitter as twitter
			   FROM users u,beauty b where u.id=b.fk_users_id ";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
	echo "<div class='icerik beauty-person' id='beauser".$row[ 'fk_users_id']."'>
	<div class='container'>
  
    <div class='person-uclu'><img src='".$row[ "gorsel"]."' width='100%' class='siyah-beyaz-person'></div>
    <div class='person-uclu'>
      <div class='person-ad-soyad'>".$row[ "name"]." ". $row[ "surname"]. "</div>";
	  
		$kimdeyiz=$row[ "bid"];

	  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='beauty' and fk_id='$kimdeyiz' and dil='$kimdil'";
$resultcev = $conn->query( $sql );
	  if ( $resultcev->num_rows > 0 ) {
		  while ( $rowcev = $resultcev->fetch_assoc() ) {

		  echo" <div class='person-tanitim-yazisi'>".$rowcev[ "metin"]."</div>";
		  
	  }}
		else
		{
			
				  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='beauty' and fk_id='$kimdeyiz' and dil='en'";
$resultcev = $conn->query( $sql );

			while ( $rowcev = $resultcev->fetch_assoc() ) {
		  echo" <div class='person-tanitim-yazisi'>".$rowcev[ "metin"]."</div>";
			}
	 
			
			
		}

	   if ($esitmi==0)
	   {
		 echo "<a href='vote.php?to=".$row[ 'fk_users_id']."' id='votekullanhref".$row[ 'fk_users_id']."'> <div class='person-vote-button' id='votekullanbuton".$row[ 'fk_users_id']."'><i class='fas fa-vote-yea'></i>&nbsp;&nbsp;	" ; 
	   }
else
{

echo "<a class='votehref' id='votekullanhref".$row[ 'fk_users_id']."' onclick='voteKullanma(event)'> <div class='person-vote-button-pasif' id='votekullanbuton".$row[ 'fk_users_id']."'><i class='fas fa-vote-yea'></i>&nbsp;&nbsp;	";
}
	   
	    	?> 
		<?= _VOTE ?>
		<?php echo " </div> </a>
    </div>
    <div class='person-uclu'>
	
		
		
		
						 <div class='counter-tutar'>
	  <div
  data-progress='".
		
		 date_diff(date_create($row[ 'date_of_birth']), date_create('today'))->y
		
		."'
  data-track-width='10' 
  data-track-colour='555555' 
  data-fill-colour='ebebeb' 
  data-text-colour='FFFFFF' 
  data-stroke-colour='' 
  data-stroke-spacing='1'
  class='progress beauty'> 
</div>
        <div class='progres-yazisi'>";
		
		?> 
		<?= _AGE ?>
		<?php echo "
		
		</div>
        <div style='clear:both;'></div>
      </div>
		
				
      <div class='counter-tutar'>

<div
  data-progress='".$row[ 'boy']."'
  data-track-width='10' 
  data-track-colour='555555' 
  data-fill-colour='ff0000' 
  data-text-colour='FFFFFF' 
  data-stroke-colour='' 
  data-stroke-spacing='1'
  class='progress beauty'> 
</div>
<div class='progres-yazisi'>

";
		
		?> 
		<?= _HEIGHT ?>
		<?php echo "

</div>
        <div style='clear:both;'></div>
      </div>
		
	  
			 <div class='counter-tutar'>

<div
  data-progress='".$row[ 'kilo']."'
  data-track-width='10' 
  data-track-colour='555555' 
  data-fill-colour='ffa7a7' 
  data-text-colour='FFFFFF' 
  data-stroke-colour='' 
  data-stroke-spacing='1'
  class='progress beauty'> 
</div>
        <div class='progres-yazisi'>
		
		";
		
		?> 
		<?= _WEIGHT ?>
		<?php echo "
		
		</div>
        <div style='clear:both;'></div>
      </div>  
	  
	  
	  
	  		
				 <div class='counter-tutar'>

<div
  data-progress='".$row[ 'beden']."'
  data-track-width='10' 
  data-track-colour='555555' 
  data-fill-colour='ebebeb' 
  data-text-colour='FFFFFF' 
  data-stroke-colour='' 
  data-stroke-spacing='1'
  class='progress beauty'> 
</div>
        <div class='progres-yazisi'>
		
		
		";
		
		?> 
		<?= _SIZE ?>
		<?php echo "
		
		
		</div>
        <div style='clear:both;'></div>
      </div>
	  
	      </div>
		  
		  
		  
		
	  <div style='clear:both;'></div>
	  <div class='sosyal-medya-baslik'>";
		?>
		<?= _SOCIAL_MEDIA ?>
		<?php
		echo "</div>
	  <div class='row'>
		 ";
		if ($row[ "facebook"])
		{echo " <div class='col-sm-4 col-md-3 col-lg-2 beauty-sosyaller'><a href='social-click.php?to=http://facebook.com/".$row[ "facebook"]."&smname=facebook&who=".$row[ 'fk_users_id']."' target='_blank'><i class='fab fa-facebook-f'></i>&nbsp;&nbsp;/".$row[ "facebook"]."</a></div>";}
		if ($row[ "instagram"])
		{echo " <div class='col-sm-4 col-md-3 col-lg-2 beauty-sosyaller'><a href='social-click.php?to=http://instagram.com/".$row[ "instagram"]."&smname=instagram&who=".$row[ 'fk_users_id']."' target='_blank'><i class='fab fa-instagram'></i>&nbsp;&nbsp;/".$row[ "instagram"]."</a></div>";}
		if ($row[ "twitch"])
		{echo " <div class='col-sm-4 col-md-3 col-lg-2 beauty-sosyaller'><a href='social-click.php?to=http://twitch.com/".$row[ "twitch"]."&smname=twitch&who=".$row[ 'fk_users_id']."' target='_blank'><i class='fab fa-twitch'></i>&nbsp;&nbsp;/".$row[ "twitch"]."</a></div>";}
		if ($row[ "youtube"])
		{echo " <div class='col-sm-4 col-md-3 col-lg-2 beauty-sosyaller'><a href='social-click.php?to=http://youtube.com/".$row[ "youtube"]."&smname=youtube&who=".$row[ 'fk_users_id']."' target='_blank'><i class='fab fa-youtube'></i>&nbsp;&nbsp;/".$row[ "youtube"]."</a></div>";}
		if ($row[ "twitter"])
		{echo " <div class='col-sm-4 col-md-3 col-lg-2 beauty-sosyaller'><a href='social-click.php?to=http://twitter.com/".$row[ "twitter"]."&smname=twitter&who=".$row[ 'fk_users_id']."' target='_blank'><i class='fab fa-twitter'></i>&nbsp;&nbsp;/".$row[ "twitter"]."</a></div>";}
		
		
		
		
		
		echo "
	  </div>

		
  
		  
		  
		  
		  
		  
    <div style='clear:both;'></div>
  </div>
</div>
	  
	  ";


        }
    }
$conn->close();






?>



	  <div style="clear:both;"></div>


		
		

<script src="https://d3js.org/d3.v5.min.js"></script>
<script src="js/plugin.js"></script>
<script type="text/javascript">
	
$(document).ready(function () {
	
	
var voted = getUrlParameter('voted');
var already_voted=getUrlParameter('already_voted');
	
if (voted == "true") {
	alert("Your vote succesfully proccessed.");
}

if(already_voted=="true"){
	alert("You cant vote more than once.");
}
	
	
	
	
var guzellikler=document.getElementsByClassName("icerik beauty-person");
var renkler=["#612421","#214d65","#5c2d58"];
	var renksayisi=0;
	for (var i=0;i<guzellikler.length;i++)
		{if(renksayisi==3){renksayisi=0}
			guzellikler[i].style.backgroundColor=renkler[renksayisi];
			renksayisi++;
			
		}
	
	
	
	
	});
	
	function voteKullanma(event){
		
		 event.preventDefault();
	}
	
	
	
	
	
	
	

</script>



<?php
include "bottom.php";

?>
