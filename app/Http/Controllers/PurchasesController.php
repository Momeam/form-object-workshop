<?php

namespace App\Http\Controllers;

use App\UseCases\PurchasePodcast;

class PurchasesController extends Controller
{
    public function purchase(PurchasePodcast $purchasePodcast): string
    {
        $purchasePodcast->handle();

        return 'Done';
    }
}
