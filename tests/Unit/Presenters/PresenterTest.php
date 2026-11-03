<?php

namespace Tests\Unit\Presenters;

use App\Models\User;
use BadMethodCallException;
use PHPUnit\Framework\TestCase;

class PresenterTest extends TestCase
{
    public function test_unknown_presenter_property_throws_a_clear_exception(): void
    {
        $presenter = (new User)->present();

        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'App\Presenters\UserPresenter does not respond to the "unknownProperty" property or method.',
        );

        $presenter->unknownProperty;
    }
}
