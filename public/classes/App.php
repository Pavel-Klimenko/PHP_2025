<?php

namespace classes;

class App
{
    protected array $commands = [];

    public function __construct(
        protected string $namespace,
        protected array $argv,
        protected string $commandName = '',
    ){}

    public function run()
    {
        $this->registerCommand();
        $this->parseOptions();

        if (!array_key_exists($this->commandName, $this->commands)) {
            throw new \RuntimeException('Error: command not found'.PHP_EOL);
        }

        $command = $this->commands[$this->commandName];

        $commandInstance = new $command;
        if (!($commandInstance instanceof CommandInterface)) {
            throw new \RuntimeException('Error: command is not implementing the correct interface'.PHP_EOL);
        }

        $status = (new $command)->execute($this->argv);

        return $status;

//        $jsonInput = file_get_contents('php://input');
//        $requestData = json_decode($jsonInput, true);
//        $bookStoreService = new BookStoreService();
//
//        if (!empty($requestData)) {
//            echo $bookStoreService->search($requestData);
//        } else {
//            echo 'Request is empty';
//        }
    }

    private function registerCommand():void
    {
        $commandFiles = new \DirectoryIterator(__DIR__.'/Commands/');

        foreach ($commandFiles as $command) {
            if (!$command->isFile()) {
                continue;
            }

            $command = $this->namespace.pathinfo($command, PATHINFO_FILENAME);
            $commandName = $command::getName();
            $this->commands[$commandName] = $command;
        }
    }

    private function parseOptions():void
    {
        if (!isset($this->argv[1])) {
            throw new \RuntimeException('Error: command not provided'.PHP_EOL);
        }

        $this->commandName = $this->argv[1];
        $this->argv = array_slice($this->argv, 2);
    }

}