<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Response;

class OutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('output.output', [
            "title" => "Pengeluaran" ,
            "outputs" => Output::where('branch_id', auth()->user()->branch_id)->latest()->get()
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
           'description' => 'required|max:255',
           'price' => 'required|max:255'
           
       ]); 


       if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['price'] = $request->price;
        $input['branch_id'] = auth()->user()->branch_id;

        Output :: create($input);

        return Response::json(['success' => '1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function show(Output $output)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function edit(Output $output)
    {
        $edit = Output::where('id',$output->id )->get();

        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Output $output)
    {
         $validator = Validator::make($request->all(), [
           'name' => 'required|max:255',
           'description' => 'required|max:255',
           'price' => 'required|max:255'
           
       ]); 


       if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $update['name'] = $request->name;
        $update['description'] = $request->description;
        $update['price'] = $request->price;

        Output :: where('id',$output->id)
                     -> update($update);

        return Response::json(['success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function destroy(Output $output)
    {
        Output :: destroy($output->id);
        return redirect ('/output')->with('success', 'Berhasil Menghapus Data');
    }
}
