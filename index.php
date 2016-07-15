<?php
declare(strict_types=1);
require_once('autoloader.php');

$tour = new \Tournament\Toucan();
$mvp = $tour->getMVP();
echo $mvp;
