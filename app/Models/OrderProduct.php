<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'store_id',
        'order_id',
        'price',
        'reference_date',
        'status',
        'amount',
        'is_delete',
        'created_at',
    ];

     
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
     
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
     
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
     
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    
    public function  getStatus($status)
    {
        $status_name = null;
        if (\App::getLocale()=='ar'){
        if($status == 'awaiting_payment')
        $status_name='بانتظار الدفع';
        elseif($status == 'underway')
        $status_name='قيد التنفيذ';
        elseif($status == 'done')
        $status_name='تم التنفيذ';
        elseif($status == 'delivery_in_progress')
        $status_name='جاري التوصيل';
        elseif($status == 'delivered')
        $status_name='تم التوصيل';
        elseif($status == 'reference')
        $status_name='مرجع';
    }else{

        if($status == 'awaiting_payment')
        $status_name='Awaiting Payment';
        elseif($status == 'underway')
        $status_name='Underway';
        elseif($status == 'done')
        $status_name='Done';
        elseif($status == 'delivery_in_progress')
        $status_name='Delivery in Progress';
        elseif($status == 'delivered')
        $status_name='Delivered';
        elseif($status == 'reference')
        $status_name='Reference';
    }

        return $status_name;
    } 
}
