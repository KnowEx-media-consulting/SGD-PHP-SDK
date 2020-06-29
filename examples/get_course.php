<?php

use KnowEx\Sgd\Sgd;

require '../src/Sgd.php';

$sgd = new Sgd('USER_NAME','API_KEY');

print_r($sgd->request('GET', '/course/21'));