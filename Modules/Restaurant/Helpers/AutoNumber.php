<?php

namespace Modules\Restaurant\Helpers;
use Modules\Restaurant\Entities\Orders;

class AutoNumber {
    public static function generateOrderNumber(){
        $prefix = 'ABC';
        $last_data=Orders::latest()->value('no');

        if($last_data === null){
            $max_number = 0;
        }else{
            $tmp = explode('-',$last_data);
            if(substr($tmp[0],3) === date('dmY')){
                $max_number = intval($tmp[1]);
            }else{
                $max_number = 0;
            }
        }
        $invoice_number = $prefix.date('d').''.date('m').''.date('Y').'-'.(sprintf("%03s",$max_number+1));
        return $invoice_number;
    }
}
