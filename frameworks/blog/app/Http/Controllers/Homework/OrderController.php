<?php

namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orders_show()
    {
        $query = Order::with(['users'])
        ->where('order_number', '<>', '0');

        $orders = $query->orderBy('order_date')->paginate(20);
//        dd($orders);

        return view('site.order_list', compact('orders'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_show($id)
    {
        $order = Order::with(['users'])->where('id', $id)->first();
        return view('site.order_one', array('order'=>$order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderCreateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
