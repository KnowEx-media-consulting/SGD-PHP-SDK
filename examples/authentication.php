<?php

use KnowEx\Sgd\Sgd;

require '../src/Sgd.php';

$sgd = new Sgd('INSERT_API_KEY_HERE');

print_r($sgd->request('POST', '/auth/login', [
    'username' => '',
    'apiKey' => ''
]));