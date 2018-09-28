<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    const API_ID = 123456;
    const TRANS_KEY = 'TRANSACTION KEY';

    public function processPayment(array $paymentDetails)
    {

    }

    public function doSomething($array = [])
    {
        return array_pop($array);
    }

    public function method()
    {

    }
}
