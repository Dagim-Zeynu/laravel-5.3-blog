<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Profile;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required|email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' =>'uploads/avatars/1.jpg'
        ]);
        Session::flash('success', 'User added successfully.');
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user =User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success', 'User deleted successfully.');
        return redirect()->back();
    }

    public function admin($id){
        $users = User::find($id);
        $users->admin = 1;
        $users->save();
        Session::flash('success', 'Successfully changed user permissions.');
        return redirect()->back();
    }
    public function not_admin($id){
        $users = User::find($id);
        $users->admin = 0;
        $users->save();
        Session::flash('success', 'Successfully changed user permissions.');
        return redirect()->back();
    }
}
