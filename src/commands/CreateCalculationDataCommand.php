<?php

namespace src\commands;

use trinity\console\ConsoleColors;
use trinity\contracts\ConsoleCommandInterface;
use trinity\contracts\ConsoleOutputInterface;
use trinity\contracts\FileHandlerInterface;
use trinity\exception\baseException\LogicException;

class CreateCalculationDataCommand implements ConsoleCommandInterface
{
    private static string $signature = 'hello';
    private static string $description = 'Поприветствуйте!';
    private static bool $hidden = false;

    /**
     * @return string
     */
    public static function getSignature(): string
    {
        return self::$signature;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        echo 'Hello there!' . PHP_EOL;
    }

    /**
     * @return string
     */
    public static function getDescription(): string
    {
        return self::$description;
    }

    /**
     * @return bool
     */
    static function getHidden(): bool
    {
        return self::$hidden;
    }
}