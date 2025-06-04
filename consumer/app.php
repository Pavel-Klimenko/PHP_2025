<?php

require_once '../vendor/autoload.php';

use App\Services\RabbitMQManager;

try {
    $rabbitMQManager = new RabbitMQManager();
    $rabbitMQManager->consumeMessages();
} catch (Exception $e) {
    print_r($e->getMessage());
}