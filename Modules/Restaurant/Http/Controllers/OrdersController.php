<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Restaurant\Helpers\AutoNumber;
use Modules\Restaurant\Entities\Orders;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $orders = Orders::all();
        return view('restaurant::orders.index')
        ->withTitle('List Pesanan')
        ->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $no = AutoNumber::generateOrderNumber();
        return view('restaurant::orders.create')->withTitle('pesanan ' .$no);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $form = $request->input("form");
        $model = new Orders;
        $model->no = AutoNumber::generateOrderNumber();
        $model->desk_no = $form["desk_no"];
        $model->items = $form["items"];
        $model->status = "Y";
        $model->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('restaurant::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $order=Orders::find($id);
        return view('restaurant::orders.edit')
        ->withOrder($order)
        ->withTitle('Edit Pesanan '.$order->no);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $model=Orders::find($id);
        $form = $request->input("form");
        $model->desk_no = $form["desk_no"];
        $model->items = $form["items"];
        $model->status = $form["status"];
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
