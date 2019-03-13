<?php

require 'vendor/autoload.php';

use Otus\Lessons\Lesson4\Sorter;

$example = new Sorter();

$array = [1,4,3,5,2,6];

$example->setSortStyle(SORT_INSERT) . PHP_EOL;
var_dump($example->sort($array));

