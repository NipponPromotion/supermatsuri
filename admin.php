<?php
session_start();
require_once "config.php";
$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}
$sql = "SELECT * FROM admins where fk_users_id=" . $_SESSION[ "id" ];
$result = $conn->query( $sql );


if ( $result->num_rows > 0 ) {
    // output data of each row


} else {

    header( "location: index.php" );
    exit;


}


$conn->close();
include "top.php";


?>
<div class="row">
<div class="col-lg-2 col-md-4 col-sm-4 bg-dark text-light pt-4 pb-4">
  <div class="col-12 apclick" adi="dashboard" onClick="sayfadegis(this)"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</div>
  <div class="col-12 mt-4 apclick" ><i class="far fa-newspaper"></i>&nbsp;&nbsp;News</div>
  <div class="col-10 ml-2 mt-2 text-secondary apclick" adi="newsekle" onClick="sayfadegis(this)"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add News</div>
  <div class="col-10 ml-2 mt-2 text-secondary apclick" adi="newsduzenle" onClick="sayfadegis(this)"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit News</div>
  <div class="col-12 mt-4 apclick" adi="adminekle" onClick="sayfadegis(this)"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Add Admin</div>
  <div class="col-12 mt-4 apclick" adi="ceviribc" onClick="sayfadegis(this)"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Beauty Contest Translation</div>
  <div class="col-12 mt-4 apclick" adi="ceviripf" onClick="sayfadegis(this)"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Performers Translation</div>
  <div class="col-12 mt-4 apclick" adi="contactreq" onClick="sayfadegis(this)"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Contact Requests</div>
  <div class="col-12 mt-4 apclick" adi="performersekle" onClick="sayfadegis(this)"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Add New Performer</div>
</div>
<div class="col-lg-9 col-md-8 col-sm-8">
<div id="dashboard" style="display: block" class="adminkutular">
  <div class="row">
    <div class="col-3 bg-success text-center mr-4 ml-4">
      <div class="col-12 pt-3">
        <h3>Toplam Üye Sayısı</h3>
      </div>
      <?php


      $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
      // Check connection
      if ( $conn->connect_error ) {
          die( "Connection failed: " . $conn->connect_error );
      }
      $sql = "SELECT count(*) as sayi FROM users ";
      $result = $conn->query( $sql );


      if ( $result->num_rows > 0 ) {
          // output data of each row
          while ( $row = $result->fetch_assoc() ) {
              echo "<div class='col-12'><h1>" . $row[ "sayi" ] . "</h1></div>";
          }
      }


      $conn->close();


      ?>
    </div>
    <div class="col-3 bg-warning text-center mr-4 ml-4">
      <div class="col-12 pt-3">
        <h3>Beauty Contest Yarışmacısı</h3>
      </div>
      <?php


      $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
      // Check connection
      if ( $conn->connect_error ) {
          die( "Connection failed: " . $conn->connect_error );
      }
      $sql = "SELECT count(*) as sayi FROM beauty ";
      $result = $conn->query( $sql );


      if ( $result->num_rows > 0 ) {
          // output data of each row
          while ( $row = $result->fetch_assoc() ) {
              echo "<div class='col-12'><h1>" . $row[ "sayi" ] . "</h1></div>";
          }
      }


      $conn->close();


      ?>
    </div>
    <div class="col-3 bg-info text-center mr-4 ml-4">
      <div class="col-12 pt-3">
        <h3>Performers Yarışmacısı</h3>
      </div>
      <?php


      $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
      // Check connection
      if ( $conn->connect_error ) {
          die( "Connection failed: " . $conn->connect_error );
      }
      $sql = "SELECT count(*) as sayi FROM performers ";
      $result = $conn->query( $sql );


      if ( $result->num_rows > 0 ) {
          // output data of each row
          while ( $row = $result->fetch_assoc() ) {
              echo "<div class='col-12'><h1>" . $row[ "sayi" ] . "</h1></div>";
          }
      }


      $conn->close();


      ?>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-3 bg-info text-center mr-4 ml-4">
      <div class="col-12 pt-3">
        <h3>Beauty Contest Siralamasi</h3>
      </div>
      <?php


      $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
      // Check connection
      if ( $conn->connect_error ) {
          die( "Connection failed: " . $conn->connect_error );
      }
      $sql = "SELECT v.beauty_user_id,u.name,u.surname,count(*) as sayi FROM votes v,users u where v.beauty_user_id=u.id  group by beauty_user_id,u.name,u.surname order by count(*) desc ";
      $result = $conn->query( $sql );
      $sirano = 1;

      if ( $result->num_rows > 0 ) {
          // output data of each row
          while ( $row = $result->fetch_assoc() ) {
              echo "<a href='beauty-contest.php#beauser" . $row[ "beauty_user_id" ] . "' target='_blank'><div class='col-12 text-left'><h5>" . $sirano . ". " . $row[ "name" ] . " " . $row[ "surname" ] . " - " . $row[ "sayi" ] . " oy</h5></div></a>";
              $sirano++;
          }
      }


      $conn->close();


      ?>
    </div>
  </div>
</div>
<div id="newsekle" style="display: none;" class="adminkutular">
  <form id="newseklemeformu" enctype="multipart/form-data" method="post" action="newsekle.php">
    <div class="row">
      <div class="col-10">
        <div class="row">
          <div class="col-4">
            <div class="col-12">
              <div class="row">
                <div class="col-4 m-2">
                  <label for="newsbaslik">Başlık</label>
                </div>
                <div class="col-6 m-2">
                  <input type="text" name="newsbaslik" class="newsinputlar" id="newsbaslik" required>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-4 m-2">
                  <label for="newsresim">Resim Ekleyin</label>
                </div>
                <div class="col-6 m-2">
                  <input type="file" name="newsresim" class="newsinputlar" id="newsresim" required>
                </div>
              </div>
              <div class="col-12 "> <img src="images/participant1.png" width="100%"> </div>
            </div>
          </div>
          <div class="col-7">
            <div class="col-12">
              <label for="newsmetin" >Metin Girin</label>
            </div>
            <div class="col-12">
              <textarea class="newsmetinarea" name="newsmetin" id="newsmetinid" required></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-4 pb-4">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4">
            <button class="readmoretop" id="newseklebuton" type="submit"> ADD NEW <i class="fas fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
	
	
	
	<!--NewsDüzenlemeBölümü-->
	
<div id="newsduzenle" style="display: none" class="adminkutular">
  <?php

  // Create connection
  $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


	
	  $sql = "select c.fk_id,b.id,b.gorsel,b.eklenme_zamani,
c.metin as ingilizce_yazi,
c.baslik as ingilizce_baslik,
(select c4.baslik from ceviriler c4 where c4.dil='ja' and c4.fk_id=c.fk_id and c4.ceviri_tablosu=c.ceviri_tablosu) as japonca_baslik,
(select c2.metin from ceviriler c2 where c2.dil='ja' and c2.fk_id=c.fk_id and c2.ceviri_tablosu=c.ceviri_tablosu) as japonca_yazi,
(select c5.baslik from ceviriler c5 where c5.dil='tr' and c5.fk_id=c.fk_id and c5.ceviri_tablosu=c.ceviri_tablosu) as turkce_baslik,
(select c3.metin from ceviriler c3 where c3.dil='tr' and c3.fk_id=c.fk_id and c3.ceviri_tablosu=c.ceviri_tablosu) as turkce_yazi
from ceviriler c,news b
where c.dil ='en' 
and c.ceviri_tablosu ='news'
and c.fk_id =b.id 
order by b.eklenme_zamani asc";
	
	
  $result = $conn->query( $sql );


  if ( $result->num_rows > 0 ) {
      // output data of each row

      while ( $row = $result->fetch_assoc() ) {

          $gorselyolu = $row[ "gorsel" ];
          $monthNum = date( "m", strtotime( $row[ "eklenme_zamani" ] ) );
          $dayNum = date( "d", strtotime( $row[ "eklenme_zamani" ] ) );
          $yearNum = date( "y", strtotime( $row[ "eklenme_zamani" ] ) );
          $yazi = mb_substr( $row[ "ingilizce_yazi" ], 0, 30 );
          $dateObj = DateTime::createFromFormat( '!m', $monthNum );
          $monthName = $dateObj->format( 'F' ); // March


          echo "
			
<script type='text/javascript'>  
			  	
	var haber" . $row[ "id" ] . "=new Array();
	
	
	
	haber" . $row[ "id" ] . ".push('" . $row[ "ingilizce_baslik" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "gorsel" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "ingilizce_yazi" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "japonca_baslik" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "japonca_yazi" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "turkce_baslik" ] . "');
	haber" . $row[ "id" ] . ".push('" . $row[ "turkce_yazi" ] . "');
	
			  </script>
			  
<div class='adminnewstutan'>
      <div class='haberler-ana-sayfa-kucuk'>
        <div class='haberler-ana-resim-kucuk'><img src='" . $row[ "gorsel" ] . "' width='100%'></div>
        <div class='haberler-ana-baslik'>" . $row[ "ingilizce_baslik" ] . "</div>
        <div class='haberler-ana-tarih'>" . $monthName . " " . $dayNum . "," . $yearNum . "20</div>
        <div class='haberler-ana-yazi'>" . $yazi . "...</div>
		
      </div>
	  <div class='haberler-admin-buton' style='background-color:blue' onclick='editnews(" . $row[ "id" ] . ")'><i class='far fa-edit'></i>&nbsp;&nbsp;Edit</div>
		<div class='haberler-admin-buton' style='background-color:red' onclick='silinecek(" . $row[ "id" ] . ")'><i class='far fa-trash-alt'></i>&nbsp;&nbsp;Delete</div>
		</div>
		";


      }
  }

  $conn->close();


  ?>
  <div style="clear: both"></div>
  <div style="clear: both"></div>
</div>
	<!--NewsDüzenlemeBölümü-->
	
	
	
	
<div id="adminekle" style="display: none" class="adminkutular">
  <div class="row">
    <?php

    // Create connection
    $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


    $sql = "SELECT u.id,u.username,case when a.id is not null then 1 else 0 end as adminmi FROM users u
left join admins a on a.fk_users_id=u.id";
    $result = $conn->query( $sql );


    if ( $result->num_rows > 0 ) {
        // output data of each row

        while ( $row = $result->fetch_assoc() ) {
            echo "
			  
			  <div class='col-6'>
			  <div class='row'>
			   <div class='col-5 m-1' uid='" . $row[ "id" ] . "'>" . $row[ "username" ] . "</div>
			  <div class='col-4 m-1'>";

            if ( $row[ "adminmi" ] == 1 ) {

                echo "<div id='adminsilbuton' style='background-color: red' class='admineklebutonu' onclick=\"admineklesil(" . $row[ "id" ] . ",'sil')\">DELETE ADMIN</div>";

            } else {

                echo "<div id='admineklebuton'  style='background-color: blue' class='admineklebutonu' onclick=\"admineklesil(" . $row[ "id" ] . ",'ekle')\">ADD ADMIN</div>";

            };


            echo "  </div>
			
			<div class='col-3 m-1'></div>
			
			
			
			</div></div>
			  	
	
		";


        }
    }

    $conn->close();


    ?>
  </div>
</div>
<div id="ceviribc" style="display: none;" class="adminkutular">
  <div class="row">
    <div class="col-2 border text-center font-weight-bold">Name Surname</div>
    <div class="col-3 border text-center font-weight-bold">English</div>
    <div class="col-3 border text-center font-weight-bold">japanese</div>
    <div class="col-3 border text-center font-weight-bold">Turkish</div>
    <div class="col-1 border text-center font-weight-bold">Edit</div>
  </div>
  <?php

  // Create connection
  $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


  $sql = "select c.fk_id,u.name ,u.surname ,
c.metin as ingilizce,
(select c2.metin from ceviriler c2 where c2.dil='ja' and c2.fk_id=c.fk_id and c2.ceviri_tablosu=c.ceviri_tablosu) as japonca,
(select c3.metin from ceviriler c3 where c3.dil='tr' and c3.fk_id=c.fk_id and c3.ceviri_tablosu=c.ceviri_tablosu) as turkce
from ceviriler c,beauty b ,users u 
where c.dil ='en' 
and c.ceviri_tablosu ='beauty'
and c.fk_id =b.id 
and b.fk_users_id =u.id 
";
  $result = $conn->query( $sql );

  $kullanicidilleri = array();
  if ( $result->num_rows > 0 ) {
      // output data of each row

      while ( $row = $result->fetch_assoc() ) {
          echo "
				
				
				<div class='row'>
		<div class='col-2 border'>" . $row[ "name" ] . " " . $row[ "surname" ] . "</div>
		<div class='col-3 border'>" . $row[ "ingilizce" ] . "</div>
		  <div class='col-3 border'>" . $row[ "japonca" ] . "</div>
		 <div class='col-3 border'>" . $row[ "turkce" ] . "</div>
		  
		  <div class='col-1 bg-info border text-center font-weight-bold' style='cursor:pointer' onclick='yazicevir(\"beauty\",\"" . $row[ "fk_id" ] . "\",\"" . $row[ "ingilizce" ] . "\",\"" . $row[ "japonca" ] . "\",\"" . $row[ "turkce" ] . "\")'><i class='far fa-edit'></i>&nbsp;&nbsp;Edit</div>
		</div>	
				
				
				
				
				
				
		
	
		";


      }
  }

  $conn->close();


  ?>
</div>
	
	
	
	<!--Performers Translateleri-->
<div id="ceviripf" style="display: none;" class="adminkutular"> 
	
	  <div class="row">
    <div class="col-2 border text-center font-weight-bold">Perf.Name</div>
    <div class="col-3 border text-center font-weight-bold">English</div>
    <div class="col-3 border text-center font-weight-bold">japanese</div>
    <div class="col-3 border text-center font-weight-bold">Turkish</div>
    <div class="col-1 border text-center font-weight-bold">Edit</div>
  </div>
	
	
	  <?php

  // Create connection
  $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


  $sql = "select c.fk_id,b.perf_name,
c.metin as ingilizce,
(select c2.metin from ceviriler c2 where c2.dil='ja' and c2.fk_id=c.fk_id and c2.ceviri_tablosu=c.ceviri_tablosu) as japonca,
(select c3.metin from ceviriler c3 where c3.dil='tr' and c3.fk_id=c.fk_id and c3.ceviri_tablosu=c.ceviri_tablosu) as turkce
from ceviriler c,performers b
where c.dil ='en' 
and c.ceviri_tablosu ='performers'
and c.fk_id =b.id 
";
  $result = $conn->query( $sql );

  $kullanicidilleri = array();
  if ( $result->num_rows > 0 ) {
      // output data of each row

      while ( $row = $result->fetch_assoc() ) {
          echo "
				
				
				<div class='row'>
		<div class='col-2 border'>" . $row[ "perf_name" ] . " </div>
		<div class='col-3 border'>" . $row[ "ingilizce" ] . "</div>
		  <div class='col-3 border'>" . $row[ "japonca" ] . "</div>
		 <div class='col-3 border'>" . $row[ "turkce" ] . "</div>
		  
		  <div class='col-1 bg-info border text-center font-weight-bold' style='cursor:pointer' onclick='yazicevir(\"performers\",\"" . $row[ "fk_id" ] . "\",\"" . $row[ "ingilizce" ] . "\",\"" . $row[ "japonca" ] . "\",\"" . $row[ "turkce" ] . "\")'><i class='far fa-edit'></i>&nbsp;&nbsp;Edit</div>
		</div>	
				
				
				
				
				
				
		
	
		";


      }
  }

  $conn->close();


  ?>
	
	
	
	
	
	
	</div>
	<!--Performers Translateleri-->
	
	
	
	
	
	
	
	
	
	
	
	
	
<div id="contactreq" style="display: none;" class="adminkutular">
  <?php

  // Create connection
  $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


  $sql = "select * from contact order by answered asc";
  $result = $conn->query( $sql );

  $kullanicidilleri = array();
  if ( $result->num_rows > 0 ) {
      // output data of each row

      while ( $row = $result->fetch_assoc() ) {
          $cevaplandimi = $row[ "answered" ];
          if ( $cevaplandimi == 1 ) {
              echo "<div class='col-12 bg-success m-4 p-4'>";
          } else {
              echo "<div class='col-12 bg-info m-4 p-4'> ";
          }
          echo "
				
				
						
			<div class='row'>
	  <div class='col-6 bg-light p-4 rounded m-4'>
		  <div class='row'>
		  <div class='col-2 font-weight-bold'>Date</div>
		   <div class='col-10'>" . $row[ "date" ] . "</div>
			  </div>
		  <div class='row'>
		 <div class='col-2 font-weight-bold'>Name</div>
		  <div class='col-10'>" . $row[ "name" ] . "</div>
			   </div>
		  <div class='row'>
		 <div class='col-2 font-weight-bold'>E-Mail</div>
		  <div class='col-10'>" . $row[ "email" ] . "</div>
			   </div>
		  <div class='row'>
		 <div class='col-2 font-weight-bold'>Subject</div>
		  <div class='col-10'>" . $row[ "subject" ] . "</div>
			   </div>
		  <div class='row'>
		 <div class='col-2 font-weight-bold'>Message</div>
		  <div class='col-10'>" . $row[ "message" ] . "</div>
			   </div>
		  
		  </div>
				
				 <div class='col-5 bg-light p-4 rounded m-4'>";

          if ( $cevaplandimi == 1 ) {
              echo " <div class='col-12'>Answered</div>
					  <div class='row'>
		 <div class='col-3 font-weight-bold'>Answer Date</div>
		  <div class='col-9'>" . $row[ "answertime" ] . "</div>
			   </div>
					";

          } else {

              echo "  <div class='col-12'>Not Answered Yet</div>
		  <div class='col-12'>
		  <label for='answeredit'>I've answered it
		  <input type='checkbox' class='answeredit' name='answeredit' id='answeredit' which='" . $row[ "id" ] . "'>
		  </label>
		  
		  </div>";


          }


          echo "

		  </div>
				
		  </div>
	  </div>
				
				
				
				
				
				
				
				
		
	
		";


      }
  }

  $conn->close();


  ?>
</div>

<!--PERFORMERS EKLEME BÖLÜMÜ------->
<div id="performersekle" style="display: none;" class="adminkutular">
  <form action="performer-insert.php" method="post" enctype="multipart/form-data">
    <div class="row mb-6 p-4">
		
		<div class="row">
			
		<div class="col-4 p-4">
			<div class="row">
				<div class="col-6 p-2"><label for="perfname"> Performers/Group Name</label></div>
				<div class="col-6 p-2"><input name="perfname" type="text"></div>
				<div class="col-6 p-2"><label for="perfdate">Event Date</label></div>
				<div class="col-6 p-2"><input name="perfdate" type="date"></div>
			</div>
		</div>
		<div class="col-4 p-4">
			<div class="row">
				<div class="col-6 p-2"><label for="perfspec">Performer/Group Spec</label></div>
				<div class="col-6 p-2"><input name="perfspec" type="text"></div>
				<div class="col-6 p-2"><label for="perftime">Event Time</label></div>
				<div class="col-6 p-2"><input name="perftime" type="time"></div>
			</div>
		</div>	
		<div class="col-4 p-4">
			<div class="row">
				<div class="col-6 p-2"><label for="perfimage">Performer/Group Image</label></div>
				<div class="col-6 p-2"><input name="perfimages" type="file"></div>
				<div class="col-6 p-2"><label for="coklucat">Event Categories</label></div>
				<div class="col-6 p-2"> <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="coklucat[]" id="coklusecen">
          <option value=""></option>
          <?php


          $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
          // Check connection
          if ( $conn->connect_error ) {
              die( "Connection failed: " . $conn->connect_error );
          }
          $sql = "SELECT * FROM category";
          $result = $conn->query( $sql );

          if ( $result->num_rows > 0 ) {
              // output data of each row
              while ( $row = $result->fetch_assoc() ) {
                  echo "<option value='" . $row[ "category_name" ] . "' id='" . $row[ "category_name" ] . "selecti'>" . $row[ "category_name" ] . "</option>";
              }
          }


          $conn->close();


          ?>
        </select></div>
			</div>
		</div>	
			
			
			<div class="col-12 p-4">
				
				<label for="perfdesc">Performer/Group Description</label>
		<textarea name="perfdesc" style="width: 100%;height: 170px;" ></textarea></div>
			
		
		
		
		</div>
		
		
		
		
		
		
		
		
		
		
		
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
       
        <button type="submit" class="be-performer-button">Add New Performer</button>

    </div>
  </form>
</div>
	</div>
<!--PERFORMERS EKLEME BÖLÜMÜ------->

	
	
	
	
	<!--NewsDüzenlemeKutusu--->
<div style="height: 50px;"></div>
<div class="newsduzenlemetutucu" id="newsduzenlemetutucu">
  <div id="newsduzenlemekutusu" style="display: none;">
    <form id="newsduzenlemeformu" enctype="multipart/form-data" method="post" action="newsduzenle.php">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <div class="col-12">
                <div class="row">
                  <div class="col-4 m-2">
                    <label for="newsbaslik">Başlık</label>
                  </div>
                  <div class="col-6 m-2">
                    <input type="text" name="newsdbaslik" class="newsinputlar" id="newsdbaslik" required>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-4 m-2">
                    <label for="newsresim">Resim Ekleyin</label>
                  </div>
                  <div class="col-6 m-2">
                    <input type="file" name="newsdres" class="newsinputlar" id="newsdresim" onchange='duzenresmiyukle()'>
                  </div>
                </div>
                <div class="col-12 "> <img src="images/participant1.png" width="100%" height="250px" id="haberresmi"> </div>
              </div>
            </div>
            <div class="col-6">
              <div class="col-12">
                <label for="newsmetin" >Metin Girin</label>
              </div>
              <div class="col-12">
                <textarea class="newsmetinarea" name="newsdmetin" id="newsdmetinid" required></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4 pb-4">
          <div class="row">
      
            <div class="col-3">
              <button class="readmoretop" id="newsduzenlevazgec" type="button" onClick="duzenledenvazgec()" > CANCEL <i class="far fa-times-circle"></i></button>
            </div>
            <div class="col-1"></div>
            <div class="col-3">
              <button class="readmoretop" id="newsdeklebuton" type="submit" style="background-color: darkgreen"> PUBLISH <i class="fas fa-arrow-right"></i></button>
            </div>
			   <div class="col-1"></div>
            <div class="col-3">
              <button class="readmoretop" id="newsdeklebuton" type="button" style="background-color: deepskyblue" onclick='newscevir()'> TRANSLATE <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <input type="text" name="newsidd" value="" hidden="hidden" id="newsidd">
      <input type="text" name="resimyolu" value="" hidden="hidden" id="resimyolu">
    </form>
  </div>
  <div style="clear: both"></div>
</div>
	
		<!--NewsDüzenlemeKutusu--->
	
	
<div class="metinduzenleme" id="metinduzenleme">
  <div class="row">
    <div class="col-4 text-center font-weight-bold ">English</div>
    <div class="col-4 text-center font-weight-bold">Japanese</div>
    <div class="col-4 text-center font-weight-bold">Turkish</div>
  </div>
  <div class="row">
    <div class="col-4">
      <textarea class="metduzarea" id="indil" name="indil"></textarea>
    </div>
    <div class="col-4">
      <textarea class="metduzarea" id="jpdil" name="jpdil"></textarea>
    </div>
    <div class="col-4">
      <textarea class="metduzarea" id="trdil" name="trdil"></textarea>
    </div>
    <input type="text" id="diltablosu" hidden="hidden">
    <input type="text" id="fk_id" hidden="hidden">
  </div>
  <div class="row metinduzenlebutonlar mt-4">
    <div class="col-3"></div>
    <div class="col-2 bg-danger text-center font-weight-bold" onClick="metduzkapat()" style="cursor: pointer">Vazgeç</div>
    <div class="col-1"></div>
    <div class="col-2 bg-success text-center font-weight-bold" style="cursor: pointer" onClick="metinduzenle()" >Kaydet</div>
    <div class="col-3"></div>
  </div>
</div>
	
	
	
	
	
	
	<div class="metinduzenleme" id="newstranslate">
  <div class="row">
    <div class="col-4 text-center font-weight-bold ">English</div>
    <div class="col-4 text-center font-weight-bold">Japanese</div>
    <div class="col-4 text-center font-weight-bold">Turkish</div>
  </div>
  <div class="row">
    <div class="col-4">
		<input type="text" id="newsindilbaslik" name="indilbaslik">
      <textarea class="metduzarea" id="newsindil" name="indil"></textarea>
    </div>
    <div class="col-4">
		<input type="text" id="newsjpdilbaslik" name="jpdilbaslik">
      <textarea class="metduzarea" id="newsjpdil" name="jpdil"></textarea>
    </div>
    <div class="col-4">
		<input type="text" id="newstrdilbaslik" name="trdilbaslik">
      <textarea class="metduzarea" id="newstrdil" name="trdil"></textarea>
    </div>
    <input type="text" id="newsdiltablosu" hidden="hidden">
    <input type="text" id="newsfk_id" hidden="hidden">
  </div>
  <div class="row metinduzenlebutonlar mt-4">
    <div class="col-3"></div>
    <div class="col-2 bg-danger text-center font-weight-bold" onClick="metduzkapat()" style="cursor: pointer">Vazgeç</div>
    <div class="col-1"></div>
    <div class="col-2 bg-success text-center font-weight-bold" style="cursor: pointer" onClick="newsgondertrans()" >Kaydet</div>
    <div class="col-3"></div>
  </div>
</div>
	
	
	
	
	
<script type="text/javascript">
	$(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
})
	
	
	$(".answeredit").change(function() {
    if(this.checked) {

               $.ajax({
            url: "contactcevap.php",
            type: "POST",
            data: {
                "kim": $(this).attr("which")
            },
            success: function (data) {

                alert("Başarıyla Güncellendi");
                location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    }
});
	
	
	
	
function metinduzenle()
{
	
	
        $.ajax({
            url: "metincevir.php",
            type: "POST",
            data: {
                "ingilizce": $("#indil").val(),
				"japonca":$("#jpdil").val(),
				"turkce":$("#trdil").val(),
				"tablo":$("#diltablosu").val(),
				"fk_id":$("#fk_id").val()
            },
            success: function (data) {

                alert("Başarıyla Güncellendi");
                location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    
}
	
	
		
function newsgondertrans()
{
	
	
        $.ajax({
            url: "newscevir.php",
            type: "POST",
            data: {
				"ingbaslik":$("#newsindilbaslik").val(),
                "ingilizce": $("#newsindil").val(),
				"jabaslik":$("#newsjpdilbaslik").val(),
				"japonca":$("#newsjpdil").val(),
				"trbaslik":$("#newstrdilbaslik").val(),
				"turkce":$("#newstrdil").val(),
				"tablo":$("#newsdiltablosu").val(),
				"fk_id":$("#newsfk_id").val()
				
				
				
				

				
				
            },
            success: function (data) {

                alert("Başarıyla Güncellendi");
                location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    
}
	
	
	
	
	function duzenresmiyukle(){
		
		document.getElementById("newsdresim").setAttribute("name", "newsdresim");
		
	}
	
	
	function duzenledenvazgec(){
		
		document.getElementById("newsdmetinid").value = "";
        document.getElementById("newsdbaslik").value = "";
        document.getElementById("newsdresim").value = "";
		document.getElementById("newsduzenlemekutusu").style.display="none";
		document.getElementById("newsduzenlemetutucu").style.display="none";
		
	}

	
	function editnews(id)
	{

		document.getElementById("newsdresim").value = "";
		document.getElementById("newsduzenlemekutusu").style.display="block";
		document.getElementById("newsduzenlemetutucu").style.display="block";
		document.getElementById("haberresmi").src=eval("haber"+id)[1];

		
		document.getElementById("newsdmetinid").value = eval("haber"+id)[2].replaceAll("<p>", "").replaceAll("</p>", "");
        document.getElementById("newsdbaslik").value = eval("haber"+id)[0];
		document.getElementById("newsidd").value = id;
		document.getElementById("resimyolu").value = eval("haber"+id)[1];
		
	}
	
	
	function newscevir(){
		var newskim=document.getElementById("newsidd").value		
		var genislik=window.innerWidth;
		var sol =genislik/2-365
		$("#newstranslate").css("left",sol);
		$("#newstranslate").css("display","block");
		$("#newsindilbaslik").val(eval("haber"+newskim)[0]);
		$("#newsindil").val(eval("haber"+newskim)[2]);
		$("#newsjpdilbaslik").val(eval("haber"+newskim)[3]);
		$("#newsjpdil").val(eval("haber"+newskim)[4]);
		$("#newstrdilbaslik").val(eval("haber"+newskim)[5]);
		$("#newstrdil").val(eval("haber"+newskim)[6]);
		$("#newsdiltablosu").val("news");
		$("#newsfk_id").val(newskim);

		
		
		
	}
	
	
	
function sayfadegis(gelen) {
    var gelenad = $(gelen).attr('adi');
    var elements = document.getElementsByClassName("adminkutular");

    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
    $("#" + gelenad).css("display", "block");
}


$(document).ready(function (e) {
	
		
	$(".chosen-container").css("width", "100%");

	
	
    $("#newseklemeformu").on('submit', (function (e) {
        e.preventDefault();

        var txt = document.getElementById("newsmetinid").value;
        var txttostore = '<p>' + txt.replace(/\n/g, "</p>\n<p>") + '</p>';
        document.getElementById("newsmetinid").value = txttostore;
        $.ajax({
            url: "newsekle.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                document.getElementById("newsmetinid").value = "";
                document.getElementById("newsbaslik").value = "";
                document.getElementById("newsresim").value = "";

                alert("Başarıyla Düzenlendi");
				location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    }));
	
	
	
	
	
	    $("#newsduzenlemeformu").on('submit', (function (e) {
        e.preventDefault();

        var txt = document.getElementById("newsdmetinid").value;
        var txttostore = '<p>' + txt.replace(/\n/g, "</p>\n<p>") + '</p>';
        document.getElementById("newsdmetinid").value = txttostore;
        $.ajax({
            url: "newsduzenle.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                document.getElementById("newsdmetinid").value = "";
                document.getElementById("newsdbaslik").value = "";
                document.getElementById("newsdresim").value = "";
				$("#newsduzenlemekutusu").css("display", "none");
				$("#newsduzenlemetutucu").css("display", "none");
                alert("Başarıyla Eklendi");
				location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    }));
	
	
	
});

	
	
	function admineklesil(gelenid,islem)
	{
		
		        $.ajax({
            url: "admineklesil.php",
            type: "POST",
            data: {
                "id": gelenid,
				"islem":islem
            },
            success: function (data) {

                alert("Başarıyla Güncelleştirildi");
                location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
		
		
		
	}
	
	

function silinecek(gelenid)
{
    if (confirm('Are you sure you want to delete this News? You will not be able to reverse this.')) {
        $.ajax({
            url: "newssil.php",
            type: "POST",
            data: {
                "id": gelenid
            },
            success: function (data) {

                alert("Başarıyla Silindi");
                location.reload();
            },
            error: function (e) {
                alert("Bir hata oluştu");
            }
        });
    }
}

	
	function yazicevir(tablosu,fkidsi,ing,jpn,tr){
		var genislik=window.innerWidth;
		var sol =genislik/2-365
		$("#metinduzenleme").css("left",sol);
		$("#metinduzenleme").css("display","block");
		$("#indil").val(ing);
		$("#jpdil").val(jpn);
		$("#trdil").val(tr);
		$("#diltablosu").val(tablosu);
		$("#fk_id").val(fkidsi);
		

		
	}
	
	
	function metduzkapat(){
		
		$("#metinduzenleme").css("display","none");
		$("#newstranslate").css("display","none");
		
		
	}
	
</script>
<?php
include "bottom.php";

?>
