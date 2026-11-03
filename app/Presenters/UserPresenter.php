<?php

namespace App\Presenters;

class UserPresenter extends Presenter
{
    protected function welcomeMessage(): string
    {
        return sprintf(
            'Welcome, %s. You signed up %s.',
            $this->user->name,
            $this->user->created_at->diffForHumans(),
        );
    }
}
