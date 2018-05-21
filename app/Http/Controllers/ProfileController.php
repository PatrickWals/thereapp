<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        if ($request->hasFile ('profile_image')){
            $filenameWhithtxt = $request->file ('profile_image')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('profile_image')->storeAs('public/profile_image',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        return $filenametostore;
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

        return view('userprofile.edit', compact('user'));
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
            'email' => 'required',
            'profile_image'=> 'image|nullable|max:1999' 
            ]);
        
    if ($request->hasFile ('profile_image')){
        $filenameWhithtxt = $request->file ('profile_image')-> getClientOriginalName(); 
        // Get just filename
        $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
        //get just ext
        $extention= $request->file('profile_image')->getClientOriginalExtension();
        //Filename to store
        $filenametostore = $filename.time().'.'.$extention; 
        //upload image
        $path = $request->file('profile_image')->storeAs('public/profile_image',$filenametostore);
    } else {
        $filenametostore='noimage.jpg';
    }
    return $filenametostore;

        $user = User::whereUsername($username);
        $user->Firstname = $request->input('firstname');
        $user->Lastname = $request->input('lastname');
        $user->Phone = $request->input('phone');
        $user->Mobile = $request->input('mobile');
        $user->Email = $request->input('email');
        $user->Profile_Pic = $filenametostore;
        $user->save();

        return redirect("/profile/".$username)->with('success', 'Post Updated');
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
