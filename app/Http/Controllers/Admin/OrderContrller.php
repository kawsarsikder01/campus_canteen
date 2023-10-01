<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OrderContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::All();
       return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orderDetails = $order->orderProducts;
        $total        = $order->amount;
        $orderId      = $order->id;
        return view('admin.orders.view',compact('orderDetails','total','orderId'));
    }
    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $orderedProduct = $order->orderProducts;
        $data = [
         'orderDetails' => $orderedProduct
        ];
        $total        = $order->amount;
        $amount = [
            'total' => $order
        ];
        
        $todayData = Carbon::now();
        $pdf = Pdf::loadView('admin.orders.invoice', $data, $amount);
        return $pdf->download('invoice'.$order->id.$todayData.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // dd($order);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
