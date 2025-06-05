<?php

namespace App\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQManager
{
    const EXCHANGE_NAME = 'hash_exchange';
    const QUEUE = 'events';
    const EXCHANGE_TYPE = 'x-consistent-hash';


    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;
    private EventService $eventService;

    public function __construct(){
        $this->eventService = new EventService();
        $this->connection = new AMQPStreamConnection(
            env('RABBIT_MQ_HOST'),
            env('RABBIT_MQ_PORT'),
            env('RABBIT_MQ_USER'),
            env('RABBIT_MQ_PASSWORD'),
            env('RABBIT_MQ_V_HOST')
        );

        $this->channel = $this->connection->channel();
    }

    public function pushMessage(string $message)
    {
        $this->declareExchange($this->channel, self::EXCHANGE_NAME, self::EXCHANGE_TYPE);
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, self::EXCHANGE_NAME);
    }

    public function consumeMessages()
    {
//        $this->channel->exchange_declare(self::EXCHANGE_NAME, self::EXCHANGE_TYPE, false, false, false);
//        list($queue_name, ,) = $this->channel->queue_declare(self::QUEUE, false, false, true, false);
//
//        $this->channel->queue_bind($queue_name, self::QUEUE);
//        $callback = function (AMQPMessage $msg) {
//            $this->eventService->addEvent($msg->getBody());
//            echo ' [x] ', $msg->getBody(), "\n";
//        };
//
//        $this->channel->basic_consume($queue_name, '', false, true, false, false, $callback);
//
//        try {
//            $this->channel->consume();
//        } catch (\Throwable $exception) {
//            echo $exception->getMessage();
//        }
//
//        $this->channel->close();
//        $this->connection->close();
    }

    private function declareExchange(AMQPChannel $channel, string $name, string $type)
    {
        return $channel->exchange_declare($name, $type, false, false, false);
    }
}
