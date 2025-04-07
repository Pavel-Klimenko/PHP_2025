<?php

$nums = [8,1,2,2,3];

pr_debug($nums);

//TODO работает

pr_debug(smallerNumbersThanCurrent($nums));


function smallerNumbersThanCurrent($nums) {
    $arOutput = [];

    foreach ($nums as $num) {
        $numsSmallerThanCurrentAmount = 0;
        foreach ($nums as $numForCompare) {
            if ($numForCompare < $num) {
                $numsSmallerThanCurrentAmount++;
            }
        }

        $arOutput[] = $numsSmallerThanCurrentAmount;
    }

    return $arOutput;
}



function pr_debug($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}