<?php

pr_debug("Изначальный массив");
$nums = [-1,1,-6,4,5,-6,1,4,1];
pr_debug($nums);

pr_debug('Отсортированный массив');
pr_debug(frequencySort($nums));


function frequencySort($nums) {
    $frequencyMap = [];
    foreach ($nums as $num) {
        $frequencyMap[$num] = isset($frequencyMap[$num]) ? $frequencyMap[$num] + 1 : 1;
    }

    usort($nums, function($a, $b) use ($frequencyMap) {
        $freqCompare = $frequencyMap[$a] - $frequencyMap[$b];
        if ($freqCompare === 0) {
            return $b - $a;
        } else {
            return $freqCompare;
        }
    });

    return $nums;
}

function pr_debug($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}