<?php
require "vendor/autoload.php";

session_start();

// Get the 'default' object in the config/cacheconfig.php
$pool = \ByJG\Cache\CacheContext::psrFactory();

$item = $pool->getItem('key');
if (!$item->isHit()) {
    $item->set('My Value');
    $pool->save($item);
}

$item2 = $pool->getItem('key');
if ($item2->isHit()) {
    echo "Atingiu";
} else {
    echo 'Não achou!';
}

print_r($_SESSION);
