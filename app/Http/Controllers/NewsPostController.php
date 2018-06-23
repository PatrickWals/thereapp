<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsPost;
use Auth;

class NewsPostController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
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
            'body' => 'required',
            'news_pic'=>'image|nullable|max:1999',
            'futurelab' => 'required',
            'newsstatus' => 'required'
        ]);   
        if ($request->hasFile ('news_Pic')){
            $filenameWhithtxt = $request->file ('news_Pic')-> getClientOriginalName(); 
            //Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //Get just ext
            $extention= $request->file('news_Pic')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //Upload image
            $path = $request->file('news_Pic')->storeAs('public/news_Pic',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        
        $newspost = new NewsPost;
        //Checks newspost data and saves it in the newspost database
        $newspost->Title = $request->input('title');
        $newspost->Body = $request->input('body');
        $newspost->Futurelab = $request->input('futurelab');

        $newspost->User_ID = auth::user()->User_ID;
        $newspost->News_Pic= $filenametostore;

        //Sets newspost status to make sure if a newspost is visable or not.
        $newspost->News_status =$request->input('newsstatus');
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
        //Shows all newsposts.
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
            'body' => 'required',
            'futurelab' => 'required',
            'newsstatus' => 'required',
            'news_pic'=>'image|nullable|max:1999'
        ]);
        if ($request->hasFile ('news_Pic')){
            $filenameWhithtxt = $request->file ('news_Pic')-> getClientOriginalName(); 
            //Get just filename
            $filename = pathinfo ($filenameWhithtxt, PATHINFO_FILENAME); 
            //Get just ext
            $extention= $request->file('news_Pic')->getClientOriginalExtension();
            //Filename to store
            $filenametostore = $filename.time().'.'.$extention; 
            //Upload image
            $path = $request->file('news_Pic')->storeAs('public/news_Pic',$filenametostore);
        } else {
            $filenametostore='noimage.jpg';
        }
        return $filenametostore;

        //Checks newspost data and saves it in the newspost database.
        $newspost = NewsPost::find($id);
        $newspost->Title = $request->input('title');
        $newspost->Body = $request->input('body');
        $newspost->Futurelab = $request->input('futurelab');
        
        //Sets newspost status to make sure if a newspost is visable or not.
        $newspost->News_Status = $request->input('newsstatus');
        
        //Checks if image is added to newspost
        if($filenametostore != 'noimage.jpg'){
            $event->Event_Pic = $filenametostore;
        }
        
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
        //Removes newspost data from database.
        $newsposts->delete();
        return redirect('/newsposts')->with('success', 'Post Removed');
    }
}
