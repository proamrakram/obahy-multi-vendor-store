<?php

use App\Models\Currency;


     
    function exchange($currency,$amount){
        $currency = Currency::find($currency);
        if(!is_null($currency)){
            $exchange = $currency->exchange;
            return $amount*$exchange;
        }
        return $amount;
    }


    function order_number(){
        
        $check_number= \App\Models\Order::orderBy('id', 'desc')->first();
        if(is_null($check_number)){
          $check_number = 0000001;
        }else{

          $check_number=$check_number->order_number;
          $check_number= ((int) $check_number) +1;
        }
       return str_pad($check_number, 6, '0', STR_PAD_LEFT);
  
    }

    




