<?php
require 'vendor/autoload.php';

$parser = new ParsedownExtra();
$parser->setSafeMode(true);

if(isset($_REQUEST['content'])){
    echo $parser->text($_REQUEST['content']);
} else {
    echo 'HTTP 400 Bad Request';
}