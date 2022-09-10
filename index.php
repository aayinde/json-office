<?php
use Aayinde\JsonOffice\Reader\JsonStringReader;

require_once 'vender/autoload.php';

$json_tester = new JsonStringReader();
var_dump($json_tester->process());
var_dump($json_tester->error);