<?php

use KnowEx\Sgd\Sgd;

require '../src/Sgd.php';

$sgd = new Sgd('INSERT_API_KEY_HERE');

print_r($sgd->request('POST', '/registration', [
    'gender' => 'male',
    'firstName' => 'Max',
    'lastName' => 'Mustermann',
    'birthday' => '1977-07-22',
    'street' => 'Hilpertstr. 31',
    'postalCode' => '64295',
    'city' => 'Darmstadt',
    'country' => 'DE',
    'phone' => '+491706585119',
    'email' => 'max.mustermann@gmail.com',
    'bankTransfer' => true,
    'iban' => '***************8200',
    'bic' => 'DEUTDEDB666',
    'discount' => '15',
    'courseCode' => '4430',
    'formName' => 'Test-Anmeldung',
    'wkz' => '1234'
]));