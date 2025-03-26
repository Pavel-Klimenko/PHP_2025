<?php

namespace classes\Commands;

use classes\CommandInterface;

class Search implements CommandInterface
{
    private static string $name = 'es:search';

    public function execute(array $argv = [])
    {
        $total = 0;

        foreach ($argv as $value) {
            $total += $value;
        }


        var_dump($argv);
        echo 'hello es:search'.PHP_EOL;
        return 0;
    }

    public static function getName():string
    {
        return static::$name;
    }

}