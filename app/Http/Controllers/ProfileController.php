<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Interest;
use App\speciality;
use App\Userinterest;
use App\Userspeciality;
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
        //gets all interests and specialities and sends it to the "userrprofile/show" page.
        $interests = Interest::all();
        $userinterests = Userinterest::where('User_ID', Auth::user()->User_ID)->get();

        $specialities = speciality::all();
        $userspecialities = Userspeciality::where('User_ID', Auth::user()->User_ID)->get();

        return view('userprofile.show', compact('user','interests','userinterests','specialities','userspecialities'));
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
        $userinterests = Userinterest::where('User_ID', Auth::user()->User_ID)->get();
    
        $specialities = speciality::all();
        $userspecialities = Userspeciality::where('User_ID', Auth::user()->User_ID)->get();
        return view('userprofile.edit', compact('user','interests','userinterests','specialities','userspecialities'));
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
        //validate the input given by user.
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

        $interests = $request->input('interest');
        //if interest array is not empty
        if(!empty($interests))
        {
            //clears the interest data for current user
            $userinterest =  Userinterest::whereUser_id(Auth::user()->User_ID)->delete();

            foreach($interests as $interest)
            {
                $userinterest =  new Userinterest;
                //checks current user and interest to save in userinterest table
                $userinterest->User_ID = Auth::user()->User_ID;
                $userinterest->Interest_ID = $interest;
                $userinterest->save();
            }
        }

        $specialities = $request->input('speciality');
        
        //if interest array is not empty
        if(!empty($specialities))
        {
            //clears the speciality data for current user
            $userspeciality =  Userspeciality::whereUser_id(Auth::user()->User_ID)->delete();

            foreach($specialities as $speciality)
            {
                $userspecialities =  new Userspeciality;
                //checks current user and speciality to save in userspeciality table
                $userspeciality->User_ID = Auth::user()->User_ID;
                $userspeciality->speciality_ID = $speciality;
                $userspeciality->save();
            }
        }
        //Requests userprofiledata and updates the changes made by user.
        $user = User::whereUsername($username)->first();
        $user->Firstname = $request->input('firstname');
        $user->Lastname = $request->input('lastname');
        $user->Phone = $request->input('phone');
        $user->Mobile = $request->input('mobile');
        $user->Email = $request->input('email');
        $user->Futurelab_Str = $request->input('futurelab');
        $user->Aboutme_Str = $request->input('aboutme');
        if($filenametostore != 'noimage.jpg'){
            $event->Event_Pic = $filenametostore;
        }
        
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
