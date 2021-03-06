<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Customer::where('cabang_id', auth()->user()->cabang_id)->get();
        return view('customers.customers', [
        "title" => "Customer" ,
        "customers" => Customer::where('branch_id', auth()->user()->branch_id)->latest()->get()
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
       $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'gender' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }
        
        // $input = $request->all(); //untuk melakukan request data semuanya
        
            #Store Unique  Number
            $unique_no = Customer::orderBy('id', 'DESC')->pluck('id')->first();
            if($unique_no == null or $unique_no == ""){
                #If Table is Empty
                $unique_no = 1;
                }
                else{
                    #If Table has Already some Data
                    $unique_no = $unique_no + 1;
                  }
            
            $input['customer_code'] = 'PHL'.sprintf("%04s", $unique_no);
            $input['customer_name'] = $request->name;
            $input['customer_phone'] = $request->phone;
            $input['customer_address'] = $request->address;
            $input['gender_id'] = $request->gender;
            $input['status_id'] = $request->status;
            $input['branch_id'] = auth()->user()->branch_id;
           //return $input;
            Customer :: create($input);
            return Response::json(['success' => '1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.detail_customer', [
        "title" => "Customer" ,
        'details' =>  $customer
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $edit = Customer::where('id',$customer->id )->get();

        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'gender' => 'required',
            'status' => 'required'
        ]);
        // return $update = $request->all(); 
        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

            $update['customer_code'] = $request->code;
            $update['customer_name'] = $request->name;
            $update['customer_phone'] = $request->phone;
            $update['customer_address'] = $request->address;
            $update['gender_id'] = $request->gender;
            $update['status_id'] = $request->status;

            // return $customer->id;
            Customer :: where('id',$customer->id)
                     -> update($update);
            return Response::json(['success' => '1']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer :: destroy($customer->id);
        return redirect ('/customer')->with('success', 'Berhasil Menghapus Data');
    }
}
