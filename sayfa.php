<?php if(!isset($_GET['sayfa'])) { // eğer boşsa anasayfa varsayalım.
   $sayfa = 'anasayfa';
} else {
   $sayfa = $_GET['sayfa'];
}
 
switch($sayfa) {
case 'iletisim':
   echo '<h2>İletişim</h2>';
   echo '<p>Bize bilgi@site.com adresinden ulaşın!</p>';
   echo '<p><a href="/">Anasayfa</a></p>';
   break;
 
case 'hakkinda':
   echo '<h2>Hakkında</h2>';
   echo '<p>Bizi tanıyan tanır, yeniler örnek alır, tanımayanlar ibret alır.</p>';
   echo '<p><a href="/">Anasayfa</a></p>';
   break;
 
case 'anasayfa':
   echo '<h2>Sitemize hoşgeldiniz!</h2>';
   echo '<p><a href="/hakkinda">Hakkında</a><br/>';
   echo '<a href="/iletisim">İletişim</a></p>';
   break;
 
default: // hiç birisi değilse 404 varsayalim
   echo '<h2>Bulunamadı!</h2>';
   echo '<p>Böyle bir sayfamız henüz yok, değiştirilmiş ya da silinmiş olabilir.</p>';
}

?>