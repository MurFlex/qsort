<?php

function swapElement(&$arr, $left, $right){
    $temp = $arr[$left];
    $arr[$left] = $arr[$right];
    $arr[$right] = $temp;
}

function qsort(&$array){
    $pivotIndex = 0;
    $leftIndex = $pivotIndex + 1;
    $rightIndex = count($array) - 1;
    $subArray = array();

    array_unshift($subArray, $pivotIndex);
    array_unshift($subArray, $rightIndex);

    while(count($subArray) > 0) {
        $rightIndexOfSubArray = array_shift($subArray);
        $leftIndexOfSubArray = array_shift($subArray);

        $leftIndex = $leftIndexOfSubArray + 1;
        $pivotIndex = $leftIndexOfSubArray;
        $rightIndex = $rightIndexOfSubArray;

        $pivot = $array[$pivotIndex];

        if($leftIndex > $rightIndex) {
            continue;
        }

        while($leftIndex < $rightIndex) {
            while(($leftIndex <= $rightIndex) && ($array[$leftIndex] <= $pivot)) {
                $leftIndex++;
            }
            while(($leftIndex <= $rightIndex) && ($array[$rightIndex] >= $pivot)) {
                $rightIndex--;
            }
            if ($rightIndex >= $leftIndex ) {
                swapElement($array, $leftIndex, $rightIndex);
            }
        }

        if ( $pivotIndex <= $rightIndex ) {
            if ($array[$pivotIndex] > $array[$rightIndex]) {
                swapElement($array, $pivotIndex, $rightIndex);
            }
        }

        if ( $leftIndexOfSubArray < $rightIndex ) {
            array_unshift( $subArray, $leftIndexOfSubArray);
            array_unshift($subArray, ($rightIndex-1));
        }

        if ( $rightIndexOfSubArray > $rightIndex ) {
            array_unshift($subArray, ($rightIndex+1));
            array_unshift($subArray, $rightIndexOfSubArray);
        }
        }
    }

$array = array(7, 6, 1, 2, 8, 5, 2, 1, 9, 5, 4, 76, 21, 85, 1, 5, -5, -9, -12);

qsort($array);

print_r($array);

