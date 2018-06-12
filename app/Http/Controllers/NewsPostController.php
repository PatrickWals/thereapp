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
        if ($request->hasFile ('news_Pic')){
            $filenameWhithtxt = $request->file ('news_Pic')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('news_Pic')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('news_Pic')->storeAs('public/news_Pic',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        

        $newspost = new NewsPost;
        $newspost->Title = $request->input('title');
        $newspost->Body = $request->input('body');
        $newspost->Futurelab = $request->input('futurelab');

        $newspost->User_ID = auth::user()->User_ID;
        $newspost->News_Pic= $filenametostore;

        //nieuws status regelt of een newspost aan staat
        $newspost->News_status ='open';
        $newspost->save();

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
        $newspost = NewsPost::find($id);
        return view('newsposts.show')->with('newspost',$newspost);
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
        if ($request->hasFile ('news_Pic')){
            $filenameWhithtxt = $request->file ('news_Pic')-> getClientOriginalName(); 
            // Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //get just ext
            $extention= $request->file('news_Pic')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //upload image
            $path = $request->file('news_Pic')->storeAs('public/news_Pic',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        return $filenametostore;

        $newspost = NewsPost::find($id);
        $newspost->Title = $request->input('title');
        $newspost->Body = $request->input('body');

        $newspost->Futurelab = $request->input('futurelab');

        //$newspost->News_Status = $request->input('news_status');
        $newspost->News_Pic = $filenametostore;
        
        $newspost->save();

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
