<?php

namespace App\Http\Forms;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class PublishPostForm extends Form
{
    protected array $rules = [
        'body' => ['required', 'string'],
    ];

    protected function persist(array $validated): Model
    {
        return Post::create($validated);
    }
}
