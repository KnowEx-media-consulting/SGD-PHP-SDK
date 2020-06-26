<?php

use KnowEx\Sgd\Sgd;

require '../src/Sgd.php';

$sgd = new Sgd('USER_NAME','API_KEY');

print_r($sgd->request('POST', '/registration', [
    'gender' => 'male',
    'firstName' => 'Max',
    'lastName' => 'Mustermann',
    'birthday' => '1977-07-22',
    'street' => 'Hilpertstr. 31',
    'postalCode' => '64295',
    'city' => 'Darmstadt',
    'country' => 'DE',
    'phone' => '+4917012345678',
    'email' => 'max.mustermann@gmail.com',
    'bankTransfer' => true,
    'iban' => '***************8200',
    'bic' => 'DEUTDEDB666',
    'discount' => '15',
    'courseCode' => '4430',
    'formName' => 'Test-Anmeldung',
    'wkz' => '1234'
]));