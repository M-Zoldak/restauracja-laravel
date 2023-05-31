<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use Illuminate\Http\Request;

enum OrderStatus: int
{
    case inProgress = 1;
    case ready = 2;
    case delivered = 3;
}

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $tables = Table::all();
        return view('orders.index', ['orders' => $orders, 'tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $tableNr = $request->input("id");
        $dishes = Dish::all();
        $categories = DishCategory::all();
        return view('orders.create', [
            'dishes' => $dishes,
            'categories' => $categories,
            'tableNr' => $tableNr
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tableNr = $request->input("id");
        $orderDetails = $request->input("order-details");

        $order = new Order();
        $order->table_id = $tableNr;
        $order->order_status = OrderStatus::inProgress;
        $order->save();

        $orderDetails = json_decode($orderDetails, true);
        $this->addOrderItems($order->id, $orderDetails);
        return redirect('orders');
    }

    private function addOrderItems($orderId, $data)
    {
        foreach ($data as $key) {
            foreach ($key as $value) {
                $this->addOneOrderItem($orderId, $value['mealId'], $value['amount']);
            }
        }
    }

    private function addOneOrderItem($orderId, $mealId, $meal_amount)
    {
        $orderItem = new OrderItem();
        $orderItem->order_id = $orderId;
        $orderItem->meal_id = $mealId;
        $orderItem->amount = $meal_amount;
        $orderItem->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        foreach ($order->items as $orderItem) {
            $orderItem->delete();
        }
        $order->delete();
        return redirect('orders');
    }

    //orders/updateOrderStatus/{orderId}/{status}
    public function updateOrderStatus(Order $order, int $status)
    {
        $order->order_status = $status;
        $order->save();
    }

    public static function getOrderStatusString(int $status): string
    {
        $status;
        switch ($status) {
            case OrderStatus::inProgress->value:
                return 'In Progress';
            case OrderStatus::ready->value:
                return 'Ready';
            case OrderStatus::delivered->value:
                return 'Delivered';
            default:
                return 'Unknown';
        }
    }

    public static function getOrderStatusClass(int $status): string
    {
        $status;
        switch ($status) {
            case OrderStatus::ready->value:
                return 'order-ready';
            case OrderStatus::delivered->value:
                return 'order-delivered';
            default:
                return '';
        }
    }

    public static function getOrderButtonStatusMessage(int $status): string
    {
        $status;
        switch ($status) {
            case OrderStatus::inProgress->value:
                return 'Zamówienie gotowe';
            case OrderStatus::ready->value:
                return 'Dostarczono';
            case OrderStatus::delivered->value:
                return 'Usuń z listy';
            default:
                return '';
        }
    }


    public static function getOrderTotalPrice($order)
    {
        $totalPrice = 0;
        foreach ($order->items as $orderItem) {
            $totalPrice += $orderItem->amount * $orderItem->meal->price;
        }
        return $totalPrice;
    }
}
