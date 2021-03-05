<?php


function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$PublicIP = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];



session_start();
error_reporting(0);
// Form gönderildiğinde veri kontrolleri yapılacka. Burası login formunda çalışacak
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST"
    and $_POST[ "langg" ]) {

     // Store data in session variables
     $_SESSION[ "langg" ] = $_POST[ "langg" ];
	//echo"<script type='text/javascript'> location.reload(); </script>";
                        


}
             


if ( isset( $_SESSION[ "langg" ] )) {

   include "lang/lang_".$_SESSION[ "langg" ].".php";
	$kimdil=$_SESSION[ "langg" ];


}else
{
	if ($country=="JP")
	{include "lang/lang_ja.php";
$kimdil="ja";}
	
	else if ($country=="TR")
	{include "lang/lang_tr.php";
$kimdil="tr";}
	
	else {
	include "lang/lang_en.php";
$kimdil="en";}}





                            


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $title ?></title>
<meta property="og:title" content="<?= $meta_title ?>">
<meta property="og:type" content="<?= $meta_type ?>">
<meta property="og:url" content="<?= $meta_url ?>">
<meta property="og:site_name" content="<?= $meta_site_name ?>">
<meta property="og:description" content="<?= $meta_description ?>">
<meta property="og:image" content="<?= $meta_image ?>">
<link href="/style/styles.css" rel="stylesheet" type="text/css" />
<link href="/style/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="/style/buyuk_tablet.css" rel="stylesheet" type="text/css" />
<link href="/style/kucuk_tablet.css" rel="stylesheet" type="text/css" />
<link href="/style/telefon.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.0.0/css/flag-icon.min.css">
<script src="/js/jquery-3.5.1.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135251752-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135251752-6');
</script>

</head>

	
	
	
<body style="margin:0;padding:0;font-family: 'PT Sans', sans-serif;">
<div class="kursadpanelgoster" id="kpgggg"><a href="/admin.php"><i class="fas fa-user-shield"></i></a><br /><br />

<a href="/logout.php"><i class="fas fa-sign-out-alt" style="color: black;"></i></a></div>
	<div class="topribbon" id="topribbon">Help Izmir - <a href="/donate.php">Donate Now</a> - <span onClick="ribkapat()" style="cursor: pointer;color: papayawhip"><?= _DISMISS ?></span></div>

<div class="container-fluid" style="padding:0;" id="topRedBar">
  <div class="icerik" id="toppmenu" style="background:#F00;color:#FFF !important;font-family: 'PT Sans', sans-serif;font-size:14px;font-weight:bold;padding:1% 0 1% 0;text-align:center;">
	  <div class="row" style="margin-right: 0 !important;">
    <div class="col-1 col-sm-1 col-md-1 "></div>
    <div class="col-md-5 col-lg-4 col-sm-12"><a href="tel:+819035133799">
      <?= _CALL_US ?>
      +81 90-3513-3799</a> | <a href="mailto:npp@supermatsuri.com">npp@supermatsuri.com</a></div>
    <div class="col-lg-4 col-md-1"></div>
    <div class="col-md-5 col-lg-3 col-sm-12" >
		
<div style="float: left;">
<li class="dropdown language-selector" style="list-style: none;">
  <?= _LANGUAGE ?>:  
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
    <img src="/images/<?php echo $kimdil?>.png" alt="Language selector" />
  </a>
  <ul class="dropdown-menu pull-right" style="list-style: none;">
    <li onClick="dildegis(this.id)" class="active" id="en">
      <a href="#">
        <img src="/images/en.png" alt="English language selector" />
        <span>English</span>
      </a>
    </li>
    <li  onClick="dildegis(this.id)" id="ja">
      <a href="#">
        <img src="/images/ja.png" alt="Japan language selector"/>
        <span>Japan</span>
      </a>
    </li>
     <li onClick="dildegis(this.id)" id="tr">
      <a href="#">
        <img src="/images/tr.png" alt="Turkish language selector"/>
        <span>Türkçe</span>
      </a>
    </li>

  </ul>
</li>
		</div>
		
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" hidden="hidden" id="degistirenform">
		<input type="text" name="langg" id="langg" hidden="hidden">
		</form>
		
		
		<div style="float: left;">
		&nbsp;&nbsp;<a href="https://www.facebook.com/supermatsurijp" target="_blank"><i class="fab fa-facebook-f sosyal"></i></a>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/supermatsurijp" target="_blank"><i class="fab fa-twitter sosyal"></i></a>&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/supermatsurijp/" target="_blank"><i class="fab fa-instagram sosyal"></i></a></div></div>
   <!-- <div class="col-1"></div>-->
  </div>
	  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="toplogo"><a href="/index.php"><img src="/images/facebook20Ikazuni20shutten_edited.jpg" class="img-fluid" width="200px" alt="Nippon Promotion Project Logo" /></a></div>
    <div class="topbosluk" id="topbosluk"></div>
    <div class="topmenu">
      <nav class="navbar navbar-expand-md navbar-light bg-light " style="background-color:#FFF !important;padding:0;width:100%;">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" style="margin-left:80%;margin-top:-30%;"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" >
          <div class="navbar-nav mobilmenucollapse"> <a href="/index.php" class="nav-item nav-link menuButton " id="home">
            <?= _MENU_HOME ?>
            </a> 
			  
			  
			  
			  				 <li class="dropdown language-selector menuButton" style="list-style: none;background: none;" id="performers">
				
  <a href="#" class="dropdown-toggle menudeki" data-toggle="dropdown" data-close-others="true" ><?= _MENU_PERF ?>
  </a>
  <ul class="dropdown-menu pull-right" style="list-style: none;">
	   <li>
      <a href="/performers.php">

        <span><?= _MENU_PERF ?></span>
      </a>
    </li>
    <li>
      <a href="/interviews.php">

        <span><?= _MENU_INTERVIEW ?></span>
      </a>
    </li>
    <li>
      <a href="/news.php">

        <span> <?= _MENU_COMMUNITY ?></span>
      </a>
    </li>


  </ul>
</li>
			  


<a href="/watch.php" class="nav-item nav-link menuButton " id="news">
            <?= _MENU_WATCH ?>
            </a>
            <div id="acacakolan"> <a href="#" class=" nav-item nav-link menuButton " id="about">
              <?= _MENU_ABOUT ?>
              </a>
              <div class="acilirmenu" id="acilirmenu">
                <div class="acilir-uc">
                  <div class="menu-about-yazi-baslik">
                    <?= _ABOUT_MENU_1_HEAD ?>
                  </div>
                  <div class="menu-about-yazi">
                    <?= _ABOUT_MENU_1 ?>
                  </div>
                 <a href="/about.php"> <button class="readmoretop">
                  <?= _ABOUT_MENU_1_HEAD ?>
                  <i class="fas fa-arrow-right"></i></button></a>
                </div>
                <div class="acilir-uc-ara"></div>
                <div class="acilir-uc">
				  
				  <div class="menu-about-yazi-baslik">
                    <?= _ABOUT_MENU_2_HEAD ?>
                  </div>
                  <div class="menu-about-yazi">
                    <?= _ABOUT_MENU_2 ?>
                  </div>
                 <a href="/partners.php" ><button class="readmoretop">
                  <?= _ABOUT_MENU_2_HEAD ?>
                  <i class="fas fa-arrow-right"></i></button></a>
				  
				  </div>
                <div class="acilir-uc-ara"></div>
                <div class="acilir-uc">
				  
				  
				   <div class="menu-about-yazi-baslik">
                    <?= _ABOUT_MENU_3_HEAD ?>
                  </div>
                  <div class="menu-about-yazi">
                    <?= _ABOUT_MENU_3 ?>
                  </div>
                 <a href="/sponsors.php" ><button class="readmoretop">
                  <?= _ABOUT_MENU_3_HEAD ?>
                  <i class="fas fa-arrow-right"></i></button></a>
				  
				  
				  </div>
                <div style="clear: both"></div>
              </div>
              <div style="clear: both"></div>
            </div>
            <a href="/contact.php" class="nav-item nav-link menuButton " id="contact">
            <?= _MENU_CONTACT ?>
            </a> 
			  <a href="#" class="nav-item nav-link menuButton " id="expo">
            EXPO
            </a> 
				 
<a href="/donate.php" class="nav-item nav-link menuButton " id="donate" style="background: #FF0004;color: white !important;">
          <i class="fas fa-hand-holding-usd"></i>&nbsp;&nbsp;  <?= _DONATE_HEAD ?>
            </a> 
				 

			</div>
        </div>
      </nav>
		<div style="clear: both"></div>
    </div>
  </div>
</div>
