<?php

namespace App\Services;

use App\DataAccess\OrderDetailExDal;
use Illuminate\Support\Facades\Http;

class PayUService {

    protected $detailDal;

    public function __construct(OrderDetailExDal $detailDal)
    {
        $this->detailDal = $detailDal;
    }

    public function toOrder($order, $details, $flavorsById, float $taxp=0.0)
    {
        $txValue  = $order->total_price;
        $txTax    = $taxp*$order->total_price;
        $txReturn = (1-$taxp)*$order->total_price;
        $rand     = rand();

        $apiKey     = config('payu.apiKey');
        $merchantId = config('payu.merchantId');
        $accountId  = config('payu.accountId');
        $currency   = config('payu.currency');
        $refCode    = config('payu.refCode').$rand;
        $sigsource  = "$apiKey~$merchantId~$refCode~$txValue~$currency";
        $signature  = md5($sigsource);
        //dd($sigsource, $signature);

        $comments = (empty($order->comments)) ? '':" {$order->comments}";
        $detailsComment = $this->detailDal->detailsToComment($details, $flavorsById);
        $description = "Beery Purchase. $detailsComment.$comments";
        return [
            'accountId'        => config('payu.accountId'),
            'referenceCode'    => $refCode,
            'description'      => $description,
            'language'         => config('payu.language'),
            'signature'        => $signature,
            'notifyUrl'        => 'http://www.payu.com/notify',
            'additionalValues' => [
                'TX_VALUE'           => [ 'value' => $txValue , 'currency' => $currency ],
                'TX_TAX'             => [ 'value' => 0, 'currency' => $currency ],
                'TX_TAX_RETURN_BASE' => [ 'value' => 0, 'currency' => $currency ]
            ],
            'buyer' => $this->toBuyer($order),
            'shippingAddress' => $this->toAddress($order),
        ];
    }

    public function toBuyer($order)
    {
        return [
            'merchantBuyerId' => '1',
            'fullName' => $order->name,
            'emailAddress' => $order->email,
            'contactPhone' => $order->phone,
            'dniNumber' => '123456',
            'shippingAddress' => $this->toAddress($order)
        ];
    }

    public function toPayer($order)
    {
        return [
            'merchantPayerId' => '1',
            'fullName' => $order->name,
            'emailAddress' => $order->email,
            'contactPhone' => $order->phone,
            'dniNumber' => '123456',
            'billingAddress' => $this->toAddress($order)
        ];
    }

    public function toAddress($order)
    {
        $address2 = $order->address2;
        $address2 .= (empty($order->zone)) ? '' : ", {$order->zone}";
        return [
            'street1' => $order->address1,
            'street2' => $address2,
            'city' => $order->city,
            'state' => $order->state,
            'country' => $order->country,
            'postalCode' => $order->zip,
            'phone' => $order->phone
        ];
    }

    public function toCreditCard($input)
    {
        return [
            'number' => $input->{'cc-number'},
            'securityCode' => $input->{'cvv2'},
            'expirationDate' => $input->{'cc-exp'},
            'name' => $input->{'cc-name'}
        ];
    }

    public function to3ds2()
    {
        return [
            'embedded' => false,
            'eci' => "01",
            'cavv' => "AOvG5rV058/iAAWhssPUAAADFA==",
            'xid' => "Nmp3VFdWMlEwZ05pWGN3SGo4TDA=",
            'directoryServerTransactionId' => "00000-70000b-5cc9-0000-000000000cb"
        ];
    }

    public function toTransaction($order, $details, $flavorsById, $input, float $taxp=0.0)
    {
        return [
            'order' => $this->toOrder($order, $details, $flavorsById, $taxp),
            'payer' => $this->toPayer($order),
            'creditCard' => $this->toCreditCard($input),
            'extraParameters' => [ 'INSTALLMENTS_NUMBER' => 1 ],
            'type' => 'AUTHORIZATION_AND_CAPTURE',
            'paymentMethod' => $input->{'cc-method'},
            'paymentCountry' => 'CO',
            'deviceSessionId' => 'vghs6tvkcle931686k1900o6e1',
            'ipAddress' => '127.0.0.1',
            'cookie' => 'pt1t38347bs6jc9ruv2ecpv7o2',
            'userAgent' => 'Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0',
            'threeDomainSecure' => $this->to3ds2()
        ];
    }

    public function toRequest($order, $details, $flavorsById, $input)
    {
        $apiKey   = config('payu.apiKey');
        $apiLogin = config('payu.apiLogin');
        return [
            'language' => 'es',
            'command' => 'SUBMIT_TRANSACTION',
            'merchant' => [
                'apiLogin'=> $apiLogin,
                'apiKey'=> $apiKey
            ],
            'transaction' => $this->toTransaction($order, $details, $flavorsById, $input, 0.0),
            'test' => true
        ];
    }

    public function banks()
    {

    }

    public function purchase($order, $details, $flavorsById, $input)
    {
        $url = config('payu.url');
        $body = $this->toRequest($order, $details, $flavorsById, $input);
        $inJson =json_encode($body);
        $response = Http::withBody($inJson, 'application/json')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->post($url);
        $json = $response->json();
        dd($inJson, $json, $response);
    }
}