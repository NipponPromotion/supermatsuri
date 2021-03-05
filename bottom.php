
<?php 

if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true ) {
$sql = "SELECT id,fk_users_id  FROM admins WHERE fk_users_id = ?";
	 if ( $stmt = mysqli_prepare( $link, $sql ) ) {
		 
		 mysqli_stmt_bind_param( $stmt, "s",  $_SESSION[ "id" ] );
		 
		    if ( mysqli_stmt_execute( $stmt ) ) {
                // Store result
                mysqli_stmt_store_result( $stmt );

                // Check if username exists, if yes then verify password
                if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
                            $_SESSION[ "admin" ] = true;
                          

                            // Redirect user to welcome page
                            header( "location: welcome.php" );
                        } else {
                            // Display an error message if password is not valid
                             $_SESSION[ "admin" ] = false;
                        }
                    }
                } else {

                }
           
	mysqli_close( $link );
}

	 


?>



<div class="footer">
  <div class="footer-container">
    <div class="footer-four">
      <div style="width: 100%"> <img src="/images/facebook20Ikazuni20shutten_edited.jpg" width="50%">
        <div class="footer-baslik">
          <?= _FOOTER_ADDRESS ?>
        </div>
        <div class="footer-yazi">
          <?= _FOOTER_ADDRESS2 ?>
        </div>
        <div class="footer-yazi"><strong>
          <?= _FOOTER_CONTACT ?>
          </strong></div>
        <div class="footer-baslik">
          <?= _GET_SOCIAL ?>
        </div>
        <div class="footer-yazi"><a href="https://www.facebook.com/supermatsurijp" target="_blank"><i class="fab fa-facebook-f sosyal"></i></a>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/supermatsurijp" target="_blank"><i class="fab fa-twitter sosyal"></i></a>&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/supermatsurijp/" target="_blank"><i class="fab fa-instagram sosyal"></i></a>&nbsp;&nbsp;&nbsp;<a href="https://www.linkedin.com/company/supermatsuri-llc" target="_blank"><i class="fab fa-linkedin-in sosyal"></i></a></div>
      </div>
    </div>
    <div class="footer-four">
     
     <a href="/privacy_policy.php"><div class="footer-yazi">Privacy Policy</div></a> 
      <a href="/terms_of_service.php"><div class="footer-yazi">Terms Of Service</div></a>

    </div>
    <div class="footer-four">
      <div class="footer-baslik"><?= _MENU_WATCH ?></div>
     <a href="/watch.php"><div class="footer-yazi">Livestreams</div></a> 
      <a href="/interviews.php"><div class="footer-yazi">Video On Demand</div></a>

    </div>
    <div class="footer-four">
      <div class="footer-baslik"><?= _MENU_CONTACT ?></div>
      <a href="/contact.php"><div class="footer-yazi"><?= _MENU_CONTACT ?></div></a>
      <a href="/about.php"><div class="footer-yazi"><?= _MENU_ABOUT ?></div></a>

    </div>
    <div style="clear: both"></div>
  </div>
  <div style="clear: both"></div>
</div>
<div class="footer-bottom">
  <div class="footer-container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?= _COPYRIGHT ?>
  </div>
</div>


<?php


if ($kimdil=="tr" || $kimdil=="ja")
	{echo "<script type='text/javascript'>
	$('#expo').css('display','block');
	$('#expo').attr('href','/expo_".$kimdil.".php');
	</script>";}


?>

<script type="text/javascript">
	
	function dildegis(gelendil){
	
	$("#langg").val(gelendil);
	document.getElementById('degistirenform').submit();
}

	var isMobil = false;

$(document).ready(function () {
	
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    isMobil = true;
  }


  var sayfa = $("#sayfabilgisi").attr("adi")
  $(".menuButton").each(function () {
    $(this).removeClass("pasif");
    $(this).removeClass("active");
    $(this).addClass("pasif");

  });
  $("#" + sayfa).removeClass("pasif");
  $("#" + sayfa).addClass("active");


  $(window).on("load resize", function () {
	  
	  
	  //  $("#topRedBar").addClass('ribbonlutop');
	  
	  
	  
	  var ekran=screen.width;
	if(ekran<1377 && isMobil==false)
		
		{ var logog=parseInt($(".toplogo").css("width"));
		 var logom=parseInt($(".toplogo").css("margin-left"));
		var menuw=	parseInt($(".topmenu").css("width"));
		 var pencg=parseInt($( window ).width());

		 var toplam=logog+logom+menuw
		 
		 var kalan=pencg-toplam-5
			

			$("#topbosluk").css("width", kalan);
			//$(".toplogo").css("margin-left", "60px");*/
			
		}
	
	else
		{
			
			$("#topbosluk").css("display", "block");
			
		}
	  
	  if (isMobil==true)
		  	{
			
			$("#topbosluk").css("display", "none");
			
		}
	
	  
	  
    if (this.matchMedia("(min-width: 768px)").matches && isMobil == false) {
      $("#acacakolan").hover(
        function () {

          $("#acilirmenu").addClass("uzunacilir");

        },
        function () {
          $("#acilirmenu").removeClass("uzunacilir");
        }
      );
    } else {
      $("#acilirmenu").off("mouseenter mouseleave");
    }

	  
    $("div").click(function () {
var status = $(this).attr('id');


		
		if (status=="acacakolan" && $("#acilirmenu").hasClass("uzunacilir") == false)  {
        $("#acilirmenu").addClass("uzunacilir");


      } 
		else if (status=="acacakolan" && $("#acilirmenu").hasClass("uzunacilir") == true){
        $("#acilirmenu").removeClass("uzunacilir");


      }


    });


  });


});
	
	
	
	

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}
	
	
	
	jQuery(document).ready(function ($) {
        var value = "<?php 
	
	if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true )
	{
		echo $_SESSION[ "loggedin" ];
	}
	else
	{
		echo "0";
	}
	
	 ?>";
		
		
		
		
		if (value==1){
			$("#dropbaslik").html("<?= _MY_ACCOUNT ?>")
			
			$("#lo").css("display","block");
			$("#silo").css("display","none");
			//$("#menulogin").css("display","none");
		//	$("#menulogout").css("display","block");
			
		}
		
		else{
			$("#dropbaslik").html("<?= _MENU_LOGIN ?>")
			$("#lo").css("display","none");
			$("#silo").css("display","block");
		//	$("#menulogin").css("display","block");
		//	$("#menulogout").css("display","none");
			
		}
		
		
	
		var admin="<?php 
	
	if ( isset( $_SESSION[ "admin" ] ) && $_SESSION[ "admin" ] === true )
	{
		echo $_SESSION[ "loggedin" ];
	}
	else
	{
		echo "0";
	}
	
	 ?>";
		

			if (admin==1)
		{
			$("#kpgggg").css("display","block");
		}
		else
			{
			$("#kpgggg").css("display","none");
		}
		
		
		
			
    }); 
	
	

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fb6e218920fc91564c8c14e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();


function ribkapat(){
	
		$('#topribbon').css('display','none');
	$('#topRedBar').css('margin-top','-25px');
	
}
	
	

</script>
</body></html>