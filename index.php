<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

$client = new \GuzzleHttp\Client();


$furl = 'https://hentaifox.com';

$res = $client->request('GET', $furl);

$html = ''.$res->getBody();

$crawler = new Crawler($html);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $furl);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

preg_match_all('!<a href="(\/gallery\/(.*?)\/)">!', $result, $manga_url);

preg_match_all('!src="((.*?)\/thumb.jpg)" \/>!', $result, $image_src);

foreach ($image_src[1] as $key => $image) {
  print_r($image);



?>

<form method="post">
    <input type="image" name="rateButton[1]" src="<?php echo $image ?>" width="400" height="300" value="1">T
</form>

<?php } ?>
