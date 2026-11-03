<?php

namespace App\Http\Forms;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

abstract class Form
{
    protected array $rules = [];

    public function __construct(protected Request $request) {}

    public function isValid(): bool
    {
        return ! $this->validator()->fails();
    }

    public function save(): Model
    {
        return $this->persist($this->validator()->validate());
    }

    abstract protected function persist(array $validated): Model;

    protected function validator(): Validator
    {
        return ValidatorFacade::make($this->request->all(), $this->rules);
    }
}
