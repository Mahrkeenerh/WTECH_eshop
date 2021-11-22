<?php

namespace App;

class ShippingInfo
{
    public $first_name = null;
    public $last_name = null;
    public $email = null;
    public $state = null;
    public $city = null;
    public $street_and_number = null;
    public $postal_code = null;
    public $shippingPrice = 0;
    public $shippingOption = null;
    public $paymentPrice = 0;
    public $paymentOption = null;

    public function __construct($first_name, $last_name, $email, $state, $city, $street_and_number, $postal_code, $delivery_option)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->state = $state;
        $this->city = $city;
        $this->street_and_number = $street_and_number;
        $this->postal_code = $postal_code;
        $this->shippingOption = $delivery_option;
        switch ($delivery_option)
        {
            case 'goods_delivery':
                $this->shippingPrice = 3.50;
                break;
            case 'rapids_couriers':
                $this->shippingPrice = 4.00;
                break;
            case 'national_transport':
                $this->shippingPrice = 2.90;
                break;
            default:
                $this->shippingPrice = 10000;
        }
    }

    public function addPaymentOption($option)
    {
        $this->paymentOption = $option;
        switch ($option)
        {
            case 'debit_card':
                $this->paymentPrice = 0;
                break;
            case 'cash':
                $this->paymentPrice = 3.50;
                break;
            case 'account_transfer':
                $this->paymentPrice = 0.50;
                break;
            default:
                $this->paymentPrice = 100000;
        }
    }

}
