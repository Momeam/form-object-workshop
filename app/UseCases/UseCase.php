<?php

namespace App\UseCases;

abstract class UseCase
{
    public static function perform(): void
    {
        (new static)->handle();
    }

    abstract public function handle(): void;
}
