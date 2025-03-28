<?php

require_once '../vendor/autoload.php';
require_once 'autoload.php';


$client = new MongoDB\Client("mongodb://mongodb:27017");

$db = $client->demo;
$collection = $db->events;

//ДОБАВЛЕНИЕ СПИСКА СОБЫТИЙ

//$arEvent1000 = [
//    'priority' => 1000,
//    'conditions' => [
//        'param1' => 1,
//    ],
//    'event' => '::event::'
//];
//
//$arEvent2000 = [
//    'priority' => 2000,
//    'conditions' => [
//        'param1' => 2,
//        'param2' => 2,
//    ],
//    'event' => '::event::'
//];
//
//$arEvent3000 = [
//    'priority' => 3000,
//    'conditions' => [
//        'param1' => 1,
//        'param2' => 2,
//    ],
//    'event' => '::event::'
//];
//
//pr_debug($arEvent1000);
//
//$event1000 = json_encode($arEvent1000);
//$event2000 = json_encode($arEvent2000);
//$event3000 = json_encode($arEvent3000);
//
//pr_debug($event1000);
//
//$arEventsForInserts = [
//    [
//        'value' => $event3000,
//        'score' => 3000,
//    ],
//    [
//        'value' => $event2000,
//        'score' => 2000,
//    ],
//    [
//        'value' => $event1000,
//        'score' => 1000,
//    ]
//];
//
//$insertManyResult = $collection->insertMany($arEventsForInserts);

//$collection = $client->demo->beers;
//
//$result = $collection->find( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
//
//foreach ($result as $entry) {
//    echo $entry['_id'], ': ', $entry['name'], "\n";
//}




//ВЫДАЧА НУЖНОГО СОБЫТИЯ
//$arSavedEvents = [];
//$savedEvents = $collection->find();
//foreach ($savedEvents as $event) {
//    $arSavedEvents[] = $event['value'];
//};
//
//pr_debug($arSavedEvents);
//
//$searchParams = ['param2' => 2];
//$arAppropriateEvents = geAppropriateEvents($arSavedEvents, $searchParams);
//pr_debug($arAppropriateEvents);
//if (!empty($arAppropriateEvents)) {
//    $bestEvent = reset($arAppropriateEvents);
//    pr_debug($bestEvent);
//}
//
//function geAppropriateEvents(array $arSavedEvents, array $searchParams):array
//{
//    $arAppropriateEvents = [];
//    foreach ($arSavedEvents as $event) {
//        $arEvent = json_decode($event, true);
//        //событие считает подходящим, если подходит хотя бы одно условие
//        foreach ($arEvent['conditions'] as $paramNum => $paramVal) {
//            if (isset($searchParams[$paramNum]) && $searchParams[$paramNum] == $paramVal) {
//                $arAppropriateEvents[$arEvent['priority']] = $arEvent;
//                break;
//            }
//        }
//    }
//
//    return $arAppropriateEvents;
//}

//ОЧИСТКА ВСЕХ ДОСТУПНЫХ СОБЫТИЙ
$collection->drop();

function pr_debug($var)
{
    //if ($_REQUEST['deb'] == 'Y') {
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
    //exit();
    //}
}