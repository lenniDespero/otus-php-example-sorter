<?php

require '../vendor/autoload.php';
use Otus\Lessons\Lesson4\Sorter;

$example = new Sorter();

//Default sort style for Sorter is SORT_BUBBlE
//You can check it by getSortStyle() method
echo "Current sort style: " . $example->getSortStyle() . PHP_EOL;   // Current sort style: SORT_BUBBLE

//To get sort styles list use getSortStyles() method
echo "Sort styles: " . implode($example->getSortStyles(), ', ') . PHP_EOL;  //Sort styles: SORT_BUBBLE, SORT_QUICK, SORT_INSERT

//To set sort style use setSortStyle() method
$example->setSortStyle(SORT_INSERT);
try {
    $example->setSortStyle(WRONG_SORT);
} catch (\Exception $ex) {
    echo $ex->getMessage() . PHP_EOL;   // Chosen sort style 'WRONG_SORT' not in supported sort styles.
                                        // Use getSortStyles() method to get list of supported sort styles
}

//Sorting example
$array = [1, 4, 3, 5, 2, 6];
echo "Array in: " . implode($array, ', ') . PHP_EOL;    // Array in: 1, 4, 3, 5, 2, 6
echo "Array out: " . implode($example->sort($array), ', ') . PHP_EOL;   // Array out: 1, 2, 3, 4, 5, 6