<?php

namespace App\DataAccess;

use App\DataAccess\OrderDetailExDal;
use App\Models\OrderEx;

class OrderExDal
{
    private $detailDal;

    public function __construct(OrderDetailExDal $detailDal) {
        $this->detailDal = $detailDal;
    }

    public function fromForm($input): OrderEx
    {
        $order = new OrderEx();
        $order->invoice = false;
        $order->effective_date = null;
        $order->total_price = $input->total;

        $order->name = $input->name;
        $order->phone = $input->phone;
        $order->email = $input->email;
        $order->comments = $input->comments;

        $order->address1 = $input->address1;
        $order->address2 = $input->address2;
        $order->zone = $input->zone;
        $order->zip = $input->zip;
        $order->city = $input->city;
        $order->state = $input->state;
        $order->country = $input->country;

        return $order;
    }

    public function makeEffective(OrderEx $order)
    {
        $order->effective_date = new \DateTime();
        $order->invoice = true;
    }

    public function toPayuOrder($order, $refCode, $details, $flavorsById, float $taxp=0.0)
    {
        $txValue  = $order->total_price;
        $txTax    = $taxp*$order->total_price;
        $txReturn = (1-$taxp)*$order->total_price;

        $apiKey     = config('payu.apiKey');
        $merchantId = config('payu.merchantId');
        $accountId  = config('payu.accountId');
        $currency   = config('payu.currency');
        $signature  = md5("$apiKey~$merchantId~$refCode~$txValue~$currency");

        $comments = (empty($order->comments)) ? '':" {$order->comments}";
        $detailsComment = $this->detailDal->detailsToComment($details, $flavorsById);
        $description = "Beery Purchase. $detailsComment.$comments";
        return [
            'accountId'        => config('payu.accountId'),
            'referenceCode'    => '',
            'description'      => $description,
            'language'         => config('payu.language'),
            'signature'        => $signature,
            'notifyUrl'        => 'http://www.payu.com/notify',
            'additionalValues' => [
                'TX_VALUE'           => [ 'value' => $txValue , 'currency' => $currency ],
                'TX_TAX'             => [ 'value' => $txTax   , 'currency' => $currency ],
                'TX_TAX_RETURN_BASE' => [ 'value' => $txReturn, 'currency' => $currency ]
            ]
        ];
    }

    public function saveAll(OrderEx $order, array $details)
    {
        $order->save();
        foreach($details as $detail) {
            $detail->order_id = $order->id;
            $detail->save();
        }
    }
}
