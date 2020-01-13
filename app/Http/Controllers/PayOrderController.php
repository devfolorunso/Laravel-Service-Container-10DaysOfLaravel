<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    //Using injection class
    public function store(OrderDetails $orderDetails,PaymentGatewayContract $paymentGateway)
    {
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }

    /**Normal
    public function store()
    {
        $paymentGateway = new PaymentGateway('usd');
        dd($paymentGateway->charge(2500));

    }**/
}
