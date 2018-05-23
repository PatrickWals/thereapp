<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Interest;
use App\Userinterest;
use Auth;

class ProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        return view('userprofile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::whereUsername($username)->first();
        $interests = Interest::all();

        return view('userprofile.edit', compact('user','interests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => '',
            'mobile' => '',
            'email' => 'required'
        ]);

        $interests = $request->input('interest');
        //return $interests;
        $userinterest =  Userinterest::whereUser_id(Auth::user()->User_ID)->delete();
        foreach($interests as $interest)
        {
            $userinterest =  new Userinterest;

            $userinterest->User_ID = Auth::user()->User_ID;
            $userinterest->Interest_ID = $interest;
            $userinterest->save();
        }

        $user = User::whereUsername($username)->first();
        $user->Firstname = $request->input('firstname');
        $user->Lastname = $request->input('lastname');
        $user->Phone = $request->input('phone');
        $user->Mobile = $request->input('mobile');
        $user->Email = $request->input('email');
        //$user->Futurelab_Str = $request->input('futurelab');
        

        $user->save();

        return redirect('profile/'.$username)->with('success', 'Post Updated');
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
