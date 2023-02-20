<?php

require 'vendor/autoload.php';

// ada didocument quickstart guzzle

use GuzzleHttp\Client;

$client = new Client();



$response = $client->request('GET', 'http://www.omdbapi.com/', [
    'query' => [
        'apikey' => 'd891a33a',
        's' => 'transformers'
    ]
]);
