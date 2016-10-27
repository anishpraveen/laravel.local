<?php

namespace App\Http\Controllers;

use App\Posts;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;
use Request;

class PostsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }

    public function index(){
        
        //dd(\Auth::user());
        $posts=Posts::latest('published_on')->published()->get();

        return view('posts.index', compact('posts'));
        //return $posts;
    }
    public function show($id){
        
        $post=Posts::find($id);
       // dd($post->published_on->addSeconds(1)->diffForHumans());
       date_default_timezone_set("Asia/Kolkata"); 
       $post->published_now= $post->published_on->diffForHumans();
        if(is_null($post)){
            abort(404);
        }

        return view('posts.show', compact('post'));
        //return $post;
    }

    public function create(){

        if(\Auth::guest())
        {
            return redirect('posts');
        }
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
         date_default_timezone_set("Asia/Kolkata"); 
        $input =$request->all();
         $postname = $request->get('inputPost');
         $posttime = $request->get('inputPublishedOn');
        //Posts::create($request->all());
         $post = new Posts;
         $post->postname=$postname;
         $post->published_on=$posttime; 
         //$post=$request->all();
         //Carbon::setLocale('in');
         //$post->published_on = Carbon::now();
         $post->save();
         //$this->all();
         //$posts=Posts::all();

        //return view('posts.index', compact('posts'));

        return redirect('posts');
        //return $input;
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $post = Posts::findOrFail($id);
       
        $postname = $request->get('inputPost');
         $posttime = $request->get('inputPublishedOn');
         $npost = new Posts();
         $post->postname=$postname;
         $post->published_on=$posttime; 
          //dd($post);
        $post->update();

        return redirect('posts');
    }
}
