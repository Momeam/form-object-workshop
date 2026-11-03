<?php

namespace App\Presenters;

use App\Models\User;
use BadMethodCallException;

abstract class Presenter
{
    public function __construct(protected User $user) {}

    public function __get(string $property): mixed
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

        throw new BadMethodCallException(sprintf(
            '%s does not respond to the "%s" property or method.',
            static::class,
            $property,
        ));
    }
}
