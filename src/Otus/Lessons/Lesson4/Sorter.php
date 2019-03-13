<?php

namespace Otus\Lessons\Lesson4;

class Sorter
{
    private $sortStyle;
    private $sortFunctionName;

    const SORT_BUBBLE = 0;
    const SORT_QUICK = 1;
    const SORT_INSERT = 2;


    public static $sortFunc = array(
        self::SORT_BUBBLE => 'sortBubble',
        self::SORT_QUICK => 'quicksort',
        self::SORT_INSERT => 'insertion_sort',
    );

    public function __construct($sortStyle = SORT_BUBBLE)
    {
        $this->setSortStyle($sortStyle);
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
     * Задать тип сортировки (SORT_BUBBLE, SORT_QUICK, SORT_INSERT)
     *
     * @param  mixed $style
     *
     * @return void
     */
    public function setSortStyle($style)
    {
        $this->sortStyle = $style;
        $this->setFunctionNameByConstant();
        var_dump($this);
    }

    /**
     * getSortStyle
     *
     * @return void
     */
    public function getSortStyle()
    {
        return $this->sortStyle;
    }

    /**
     * Запуск сортировки массива
     *
     * @param  mixed $array
     *
     * @return void
     */
    public function sort($array) 
    {
        
        return self::{$this->sortFunctionName}($array);
    }

    //Сортировки
    private function sortBubble($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }
        }
        return $arr;
    }


    private function quicksort($array) 
    {
        $this->quicksortmow($array);
        return $array;
    }

    private function quicksortmow (&$array, $l=0, $r=0) {
        if($r === 0) $r = count($array)-1;
        $i = $l;
        $j = $r;
        $x = $array[($l + $r) / 2];
        do {
            while ($array[$i] < $x) $i++;
            while ($array[$j] > $x) $j--;
            if ($i <= $j) {
                if ($array[$i] > $array[$j])
                    list($array[$i], $array[$j]) = array($array[$j], $array[$i]);
                $i++;
                $j--;
            }
        } while ($i <= $j);
        if ($i < $r) $this->quicksortmow ($array, $i, $r);
        if ($j > $l) $this->quicksortmow ($array, $l, $j);
    }

    function insertion_sort($a) {
        for ($i = 1; $i < count($a); $i++) {
          $x = $a[$i];
          for ($j = $i - 1; $j >= 0 && $a[$j] > $x; $j--) {
            $a[$j + 1] = $a[$j];
          }
          $a[$j + 1] = $x;
        }
       return $a;
      }
    
}
