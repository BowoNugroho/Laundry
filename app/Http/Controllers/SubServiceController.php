<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Price;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'sub_service' => 'required|max:255',
            'estimated_time' => 'required|max:255',
            'time' => 'required|max:255',
            'price' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

         $input['service_id'] = $request->service_id;
         $input['name'] = $request->sub_service;
         $input['price'] = $request->price;
         $input['estimated_time'] = $request->estimated_time .' '.  $request->time;

        Price :: create($input);
        return Response::json(['success' => '1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $serviceid = Service::where('id',$id )->get();

        return Response::json($serviceid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        Price :: destroy($id);
        return redirect ('/service')->with('success', 'Berhasil Menghapus Data');
    }
}
