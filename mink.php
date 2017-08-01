<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

$driver = new GoutteDriver();

$session = new Session($driver);

$session->visit('http://localhost:8000/testcss/ben');
//$session->visit('http://jurassicpark.wikia.com');

echo "Status code: ". $session->getStatusCode() . "\n";
echo "Current URL: ". $session->getCurrentUrl() . "\n";

$page = $session->getPage();
//echo "First 75 chars: ".substr($page->getText() , 0, 75) . "\n";

$testCss = $page->find('css', '.blank');
echo "The wiki nav text is: ".$testCss->getText()."\n";
