<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Price;
use Illuminate\Http\Request;
use Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.transaction', [
        "title" => "Transaction" ,
        
        "customers" => Customer::where('branch_id', auth()->user()->branch_id)->orderBy('customer_name', 'asc')->latest()->get(),
        "services" => Service::where('branch_id', auth()->user()->branch_id)->latest()->get(),
        "types"=> ServiceType::all(),
        "f" => ServiceType::join('services', 'services.service_type_id', '=', 'service_types.id')
                        ->join('prices', 'prices.service_id', '=', 'services.id')
                        ->get(['services.*', 'service_types.name', 'prices.*' ])
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function dataCustomer($id)
    {
        $data = Customer::where("id", $id)->first();
        
        return Response::json(array($data));
    }
    public function dataService($id)
    {
        $data = ServiceType::join('services', 'services.service_type_id', '=', 'service_types.id')
                        ->join('prices', 'prices.service_id', '=', 'services.id')
                        ->where("services.id", $id)->get(['services.*', 'service_types.name', 'prices.*' ]);
        
        return Response::json(array($data));
    }
}
