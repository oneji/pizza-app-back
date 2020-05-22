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

    /**
     * Store a newly created order in the db
     * 
     * @param array $orderData
     * 
     * @return object
     */
    public static function store($orderData)
    {
        $order = new Order($orderData);
        $order->save();

        // Save order items
        $items = [];
        if(isset($orderData['orderItems'])) {
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
        }

        OrderItem::insert($items);
    }

    /**
     * Get all user's orders
     * 
     * @param int $userId
     * 
     * @return collection
     */
    public static function getAll($userId)
    {
        return static::with([ 
            'order_items' => function($query) {
                $query->join('pizzas', 'pizzas.id', '=', 'order_items.pizza_id')
                    ->join('pizza_sizes', 'pizza_sizes.id', '=', 'order_items.pizza_size_id')
                    ->select('pizzas.name as pizza_name', 'pizzas.image', 'order_items.*', 'pizza_sizes.name as size_name');
            } 
        ])
        ->where('user_id', $userId)
        ->orderBy('orders.created_at', 'desc')
        ->get();
    }
}
