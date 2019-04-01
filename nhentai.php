<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

//url
$url = 'https://nhentai.net/g/267691/';

$client = new \GuzzleHttp\Client();

// go get the f=date from url

$res = $client->request('GET', $url);

$html = ''.$res->getBody();

$crawler = new Crawler($html);

$nodeValues = $crawler->filter('.container > .thumb-container .gallerythumb')->each(function (Crawler $node, $i) {
    //echo $node->html();
    $image = $node->filter('img')->attr('data-src');
    echo $image;
    echo '<br>'; 
    //$imgdownload = file_get_contents($imags);
    //file_put_contents($i.'.jpg', $imgdownload);
    //$i++;
   
});
