<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;
use Carbon\Carbon;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_price_usd',
        'total_price_euro',
        'user_id',
        'delivery_address',
        'contacts',
        'comment'
    ];

    /**
     * Get the items for the order.
     */
    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public static function store($orderData)
    {
        $order = new Order($orderData);
        $order->save();

        // Save order items
        $items = [];
        foreach ($orderData['orderItems'] as $item) {
            $items[] = [
                'pizza_id' => $item['pizzaId'],
                'quantity' => $item['quantity'],
                'pizza_size_id' => $item['sizeId'],
                'order_id' => $order['id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        OrderItem::insert($items);

        return $order;
    }
}
