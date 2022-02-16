<?php

use App\Models\ShoppingCharge;

if (!function_exists('shoppingChargeDefault')) {
    function shoppingChargeDefault()
    {
        if (auth()->user()->city == 47) {
            $model = ShoppingCharge::first();
        } else {
            $model = ShoppingCharge::find('2');

        }
        return $model->charge;
    }
}
if (!function_exists('shoppingChargeOutOfDhaka')) {
    function shoppingChargeOutOfDhaka()
    {
        $model = ShoppingCharge::find('2');
        return $model->charge;
    }
}
if (!function_exists('shoppingChargeDhaka')) {
    function shoppingChargeDhaka()
    {
        $model = ShoppingCharge::first();
        return $model->charge;
    }
}
