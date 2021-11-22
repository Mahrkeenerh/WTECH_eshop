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
    public $price = 0;
    public $option = null;

    public function __constructor($first_name, $last_name, $email, $state, $city, $street_and_number, $postal_code, $option)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->state = $state;
        $this->city = $city;
        $this->street_and_number = $street_and_number;
        $this->postal_code = $postal_code;
        $this->option = $option;
        switch ($option)
        {
            case 'Goods delivery':
                $this->price = 3.50;
                break;
            case 'Rapids couriers':
                $this->price = 4.00;
                break;
            case 'National transporting company':
                $this->price = 2.90;
                break;
        }
    }

}
