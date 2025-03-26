<?php

require_once '../vendor/autoload.php';
require_once 'autoload.php';

use classes\App;

$commandsNameSpace = 'classes\\Commands\\';
$argv = $_SERVER['argv'] ?? [];

try {
    $app = new App($commandsNameSpace, $argv);
    $app->run();
}

catch (Exception $e) {
     print_r($e->getMessage());
}


function pr_debug($var)
{
    //if ($_COOKIE['PHPSESSID'] == 'm66lhq4t81u3s2i4gjojdv2e23') {
    $bt = debug_backtrace();
    $bt = $bt[0];
    ?>
    <div style='font-size:9pt; color:#000; background:#fff; border:1px dashed #000;'>
        <div style='padding:3px 5px; background:#99CCFF; font-weight:bold;'>File: <?= $bt["file"] ?>
            [<?= $bt["line"] ?>]
        </div>
        <?
        if ($var === 0) {
            echo '<pre>пусто</pre>';
            var_dump($var);
        } else {
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
        ?>
    </div>
    <?
    //}
}