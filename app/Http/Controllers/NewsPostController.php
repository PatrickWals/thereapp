<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsPost;
use Auth;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsposts = NewsPost::all();
        return view('newsposts.index')->with('newsposts', $newsposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsposts.create');
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
            'title' => 'required|min:5' ,
            'body' => 'required'
        ]);   
        
        $newsposts = new NewsPost;
        $newsposts->title = $request->input('title');
        $newsposts->body = $request->input('body');
        $newsposts->user_ID = Auth::user()->User_ID;
        $newsposts->save();

        return redirect('/newsposts')->with('succes','News added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsposts = NewsPost::find($id);
        return view('newsposts.show')->with('newspost',$newsposts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsposts = NewsPost::find($id);
        return view('newsposts.edit')->with('newspost',$newsposts);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $newsposts = NewsPost::find($id);
        $newsposts->title = $request->input('title');
        $newsposts->body = $request->input('body');
        
        $newsposts->save();

        return redirect("/newsposts/".$id)->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsposts = NewsPost::find($id);

        $newsposts->delete();
        return redirect('/newsposts')->with('success', 'Post Removed');
    }
}
