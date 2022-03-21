<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('branch.branch', [
            "title" => "Cabang" ,
            "cabangs" => Branch::all()
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
            'address' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $input['name'] = $request->name;
        $input['phone'] = $request->phone;
        $input['address'] = $request->address;

        Branch :: create($input);

        return Response::json(['success' => '1']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $edit = Branch::where('id',$branch->id )->get();

        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
        // return $update = $request->all(); 
        if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

            $update['name'] = $request->name;
            $update['phone'] = $request->phone;
            $update['address'] = $request->address;

            // return $branch->id;
            Branch :: where('id',$branch->id)
                     -> update($update);
            return Response::json(['success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        Branch :: destroy($branch->id);
        return redirect ('/branch')->with('success', 'Berhasil Menghapus Data');
    }
}
