<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Price;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.service',[
            "title" =>  "Layanan",
            "serviceType" => ServiceType::all(),
            "services" => Service::where('branch_id', auth()->user()->branch_id)->get()
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
            'service_type' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $input['service_type_id'] = $request->service_type;
        $input['service_name'] = $request->name;
        $input['service_description'] = $request->description;
        $input['branch_id'] = auth()->user()->branch_id;
        return $input;
        Service :: create($input);

        return Response::json(['success' => '1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.detail_service', [
        "title" => "Layanan" ,
        "detail" => $service,
        "prices" => Price::where('service_id', $service->id)->get()
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $edit = Service::where('id',$service->id )->get();

        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'service_type' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $update['service_type_id'] = $request->service_type;
        $update['service_name'] = $request->name;
        $update['service_description'] = $request->description;

        Service :: where('id',$service->id)
                     -> update($update);

        return Response::json(['success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service :: destroy($service->id);
        return redirect ('/service')->with('success', 'Berhasil Menghapus Data');
    }
}
