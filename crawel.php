
<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

if (isset($_POST['activated'])) {


$client = new \GuzzleHttp\Client();

$url = $_POST['url'];

$res = $client->request('GET', $url);

$html = ''.$res->getBody();

$crawler = new Crawler($html);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$manga_name = $crawler->filter('.info > h1')->text();

print_r($manga_name);

echo "<br>";

preg_match_all('!<a href="\/parody\/(.*?)\/"><span class="badge tag">(.*?)<\/span><\/a>!', $result, $parodies);
foreach ($parodies[2] as $key => $manga_parodies) {
	
}

print_r($manga_parodies);

echo "<br>";

$manga_tags = $crawler->filter('.info .artists')->text();

$tags = str_replace('Tags: ','',$manga_tags);

print($tags);

echo "<br>";


preg_match_all('!<a href="\/artist\/(.*?)\/"><span class="badge tag">(.*?)<\/span><\/a>!', $result, $artist);
foreach ($artist[2] as $key => $manga_artist) {
	$mangst =  $manga_artist;
}
print_r($manga_artist);


echo "<br>";


 preg_match_all('!<a href="\/group\/(.*?)\/"><span class="badge tag">(.*?)<\/span><\/a>!', $result, $group);
foreach ($group[2] as $key => $manga_group) {
}
print_r($manga_group);

echo "<br>";


preg_match_all('!<img src="((.*?)\/cover.jpg)"!', $result, $cover);
foreach ($cover[1] as $key => $manga_cover) {
}
$imgcover = 'https:'.$manga_cover;

        // Just some random image, this variable is normally dynamic
 
}