<?php

use Symfony\Component\DomCrawler\Crawler;

require __DIR__ . '/vendor/autoload.php';

function normalizeUrl($url) {
    return 'http://yiiframework.ru/forum/'. ltrim($url, './');
}

function getHtml($url) {
    return file_get_contents(normalizeUrl($url));
}

$forumUrl = './viewforum.php?f=28';

$html = getHtml($forumUrl);

$crawler = new Crawler($html);

print_r($crawler
    ->filterXPath("//*/div[@class='action-bar top']/div[@class='pagination']/ul/li[@class='next']/preceding::li[1]")->text());

echo PHP_EOL;

print_r($crawler
    ->filter('div.action-bar.top .pagination li:nth-last-of-type(2)')->text());

echo PHP_EOL;