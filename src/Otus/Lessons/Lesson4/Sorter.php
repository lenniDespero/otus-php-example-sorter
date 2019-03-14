<?php
declare (strict_types = 1);

namespace Otus\Lessons\Lesson4;

class Sorter
{
    private $sortStyle;
    private $sortFunctionName;

    private const SORT_BUBBLE = 0;
    private const SORT_QUICK = 1;
    private const SORT_INSERT = 2;

    public static $sortFunc = array(
        self::SORT_BUBBLE => 'sortBubble',
        self::SORT_QUICK => 'quickSort',
        self::SORT_INSERT => 'insertionSort',
    );

    public function __construct(string $sortStyle = SORT_BUBBLE)
    {
        $this->setSortStyle($sortStyle);
    }

    /**
     * getSortStyles
     * Получить список доступных типов сортировки
     *
     * @return array
     */
    public function getSortStyles(): array
    {
        return array_flip(((new \ReflectionClass(Sorter::class))->getConstants()));
    }

    /**
     * setFunctionNameByConstant
     *
     * @return void
     */
    private function setFunctionNameByConstant()
    {
        $val = constant(self . "::" . $this->sortStyle);
        $this->sortFunctionName = self::$sortFunc[$val];
    }

    /**
     * setSortStyle
     * Задать тип сортировки (SORT_BUBBLE, SORT_QUICK, SORT_INSERT)
     *
     * @param  mixed $style
     *
     * @return void
     */
    public function setSortStyle(string $style = '')
    {
        if (!in_array($style, $this->getSortStyles())) {
            throw new \Exception("Chosen sort style '$style' not in supported sort styles.\n"
                . 'Use getSortStyles() method to get list of supported sort styles');
        }
        $this->sortStyle = $style;
        $this->setFunctionNameByConstant();
    }

    /**
     * getSortStyle
     * Получить текущий тип сортировки
     *
     * @return string
     */
    public function getSortStyle(): string
    {
        return $this->sortStyle;
    }

    /**
     * sort
     * Вызов сортировки
     *
     * @param  mixed $array
     *
     * @return array
     */
    public function sort(array $array): array
    {
        return self::{$this->sortFunctionName}($array);
    }

    /**
     * sortBubble
     * Сортировка пузырьком
     *
     * @param  mixed $arr
     *
     * @return array
     */
    private function sortBubble(array $arr): array
    {
        $length = count($arr);
        for ($i = 0; $i < $length; $i++) {
            for ($j = $i + 1; $j < $length; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }
        }
        return $arr;
    }

    /**
     * quicksort
     * Вызов быстрой сортировки
     *
     * @param  mixed $array
     *
     * @return array
     */
    private function quickSort(array $array): array
    {
        $this->quickSortMow($array);
        return $array;
    }

    /**
     * quicksortMow
     * Быстрая сортировка
     *
     * @param  mixed $array
     * @param  mixed $l
     * @param  mixed $r
     *
     * @return void
     */
    private function quickSortMow(array &$array, int $l = 0, int $r = 0)
    {
        if ($r === 0) {
            $r = count($array) - 1;
        }
        $i = $l;
        $j = $r;
        $x = $array[($l + $r) / 2];
        do {
            while ($array[$i] < $x) {
                $i++;
            }
            while ($array[$j] > $x) {
                $j--;
            }
            if ($i <= $j) {
                if ($array[$i] > $array[$j]) {
                    list($array[$i], $array[$j]) = array($array[$j], $array[$i]);
                }
                $i++;
                $j--;
            }
        } while ($i <= $j);
        if ($i < $r) {
            $this->quickSortMow($array, $i, $r);
        }
        if ($j > $l) {
            $this->quickSortMow($array, $l, $j);
        }
    }

    /**
     * insertionSort
     * Сортировка вставками
     *
     * @param  mixed $arr
     *
     * @return array
     */
    public function insertionSort(array $arr): array
    {
        for ($i = 1; $i < count($arr); $i++) {
            $x = $arr[$i];
            for ($j = $i - 1; $j >= 0 && $arr[$j] > $x; $j--) {
                $arr[$j + 1] = $arr[$j];
            }
            $arr[$j + 1] = $x;
        }
        return $arr;
    }
}
