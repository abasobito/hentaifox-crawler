<?php
require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

//url
$url = 'https://hentaifox.com/gallery/58116/';

$client = new \GuzzleHttp\Client();

// go get the date from url

$res = $client->request('GET', $url);

$html = ''.$res->getBody();

$crawler = new Crawler($html);

$nameValues = $crawler->filter('.info > h1')->each(function (Crawler $node, $i) {
$textma =  $node->text();
$manganame = file_get_contents($textma);
});



