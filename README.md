# Simple sorter example
This is a simple sorting library.

### Installation

You can take it by git

```sh
$ git clone https://github.com/lenniDespero/otus-php-example-sorter.git
```
or by composer
```sh
$ composer require astepanov/otus-php-example-sorter @dev
```

### Usage
```php
<?php
    use Otus\Lessons\Lesson4\Sorter;
    $example = new Sorter();
    $array = [1, 4, 3, 5, 2, 6];
    echo "Array in: " . implode($array, ', ') . PHP_EOL; // Array in: 1, 4, 3, 5, 2, 6
    $example->setSortStyle(SORT_INSERT);
    echo "Array out: " . implode($example->sort($array), ', ') . PHP_EOL; // Array out: 1, 2, 3, 4, 5, 6
```
With exceptions
```php
<?php
    use Otus\Lessons\Lesson4\Sorter;
    $example = new Sorter();
    echo "Sort styles: " . implode($example->getSortStyles(), ', ') . PHP_EOL; // Sort styles: SORT_BUBBLE, SORT_QUICK, SORT_INSERT
    try {
        $example->setSortStyle(WRONG_SORT);
    } catch (\Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;   // Chosen sort style 'WRONG_SORT' not in supported sort styles.
                                            // Use getSortStyles() method to get list of supported sort styles
    }
```

More examples in Example folder.

### Todos

 - Add more sort styles
 - Add tests

License
----
MIT

**Free Software, Hell Yeah!**