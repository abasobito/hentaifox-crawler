<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

//url
$url = 'https://hentaifox.com/gallery/58081/';

$client = new \GuzzleHttp\Client();

// go get the f=date from url

$res = $client->request('GET', $url);

$html = ''.$res->getBody();

$crawler = new Crawler($html);

$nodeValues = $crawler->filter('.gallery .preview_thumb')->each(function (Crawler $node, $i) {
   // echo $node->html();
    $image = $node->filter('img')->attr('data-src');
    //echo $image;
    //echo '<br>'; 
  /*$find = array('//i2.hentaifox.com'or'//i.hentaifox.com');
  $replace = array('https://i.hentaifox.com');
  $arr = array($image );
  $imagerep = str_replace($find, $replace, $arr);*/
  $imagerep = str_replace(array('//i2.hentaifox.com' , '//i.hentaifox.com','t.jpg'),array('https://i2.hentaifox.com','https://i2.hentaifox.com','.jpg'),$image);
  print ($imagerep);
   echo '<br>';
      //echo '<br>'; 
    //$imgdownload = file_get_contents($imags);
    //file_put_contents($i.'.jpg', $imgdownload);
    //$i++;
});