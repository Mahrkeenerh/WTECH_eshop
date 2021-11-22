<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
//    public $shippingPrice = 0;
    public $shippingInfo = null;
//    public $paymentPrice = 0;
//    public $paymentOption = null;

    public function __construct($oldCart)
    {
        if ($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add ($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->new_price, 'item' => $item];
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->new_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->new_price;
    }

    public function remove($item, $id)
    {
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
                $this->totalQty -= $storedItem['qty'];
                $this->totalPrice -= $item->new_price * $storedItem['qty'];

                unset($this->items[$id]);
            }
        }
    }

    public function removeOne($item, $id)
    {
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $this->items[$id]['qty']--;
                $this->totalQty--;
                $this->totalPrice -= $item->new_price;

                if ($this->items[$id]['qty'] == 0)
                {
                    unset($this->items[$id]);
                }
            }
        }
    }

    public function setShippingInfo($shippingInfo)
    {
        if ($this->shippingInfo != null)
        {
            $this->totalPrice -= $this->shippingInfo->shippingPrice;
            if($this->shippingInfo->paymentOption != null)
            {
                $this->totalPrice -= $this->shippingInfo->paymentPrice;
            }
        }
        $this->shippingInfo = $shippingInfo;
        $this->totalPrice += $shippingInfo->shippingPrice;
        if ($shippingInfo->paymentOption != null)
        {
            $this->totalPrice += $shippingInfo->paymentPrice;
        }
    }
}
