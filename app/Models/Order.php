<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_number',
        'user_id',
        'product_count',
        'total_price',
        'shipping_price',
        'status',
        'is_delete',
        'created_at',
    ];



    public function getOrderNumber()
    {
            return Order::orderBy('order_number')->first()->order_number +1;
    }
    public function setOrderNumber()
    {
            $this->attributes['order_number'] = Order::orderBy('order_number')->first()->order_number +1;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }

    public function getStatus($status)
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
        elseif($status == 'canceled')
        $status_name='ملغي';
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
        elseif($status == 'canceled')
        $status_name='Canceled';
    }

        return $status_name;
    }
}
