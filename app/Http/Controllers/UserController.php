<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.user', [
            "title" => "Pengguna" ,
            "levels" => Level::all(),
            "cabangs" => Branch::all(),
            "users" => User::all()
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
           'username' => 'required|min:4|max:255|unique:users',
           'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users',
           'level' => 'required',
           'password' => 'required|min:8|max:255'
           
       ]); 

       if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $input['name'] = $request->name;
        $input['username'] = $request->username;
        $input['email'] = $request->email;
        $input['branch_id'] = $request->branch;
        $input['level_id'] = $request->level;
        $input['password'] = Hash::make($request->password);

       User :: create($input);

        return Response::json(['success' => '1']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $edit = User::where('id',$user->id )->get();

        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $rules = [
           'name' => 'required|max:255',
           'level' => 'required'
           
       ]; 

    //    jika validasi unik maka menggunakan seperti ini, supaya dapat menyimpan data yang sama.
       if($request->username != $user->username){
            $rules['username'] = 'required|min:4|max:255|unique:users';
       }
       if($request->email != $user->email){
            $rules['email'] = 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users';
       }
       
       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            
            return Response::json(['errors' => $validator->errors()]);
            
        }

        $update['name'] = $request->name;
        $update['username'] = $request->username;
        $update['email'] = $request->email;
        $update['branch_id'] = $request->branch;
        $update['level_id'] = $request->level;

       User :: where('id',$user->id)
                     -> update($update);

        return Response::json(['success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User  $user)
    {
        User :: destroy($user->id);
        return redirect ('/user')->with('success', 'Berhasil Menghapus Data');
    }
}
