<?php
require(__DIR__ . '/vendor/autoload.php');

$urls = [
	'http://234234324.com'
];

$scanner = new \Romolo\LetUs\Url\Scanner($urls);

print_r($scanner->getInvalidUrls());

