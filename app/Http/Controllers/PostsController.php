<?php

namespace App\Http\Controllers;

use App\Posts;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use Carbon\Carbon;
use Request;

class PostsController extends Controller
{
    //
    public function all(){
        
        $posts=Posts::latest('published_on')->get();

        return view('posts.index', compact('posts'));
        //return $posts;
    }
    public function show($id){
        
        $post=Posts::find($id);
        //dd($post);

        if(is_null($post)){
            abort(404);
        }

        return view('posts.show', compact('post'));
        //return $post;
    }

    public function create(){
        return view('posts.create');
    }

    public function store()
    {
        //$input = Request::all();
         $input = Request::get('inputPost');

         $post = new Posts;
         $post->postname=$input;
         //Carbon::setLocale('in');
         //$post->published_on = Carbon::now();
         $post->save();
         $this->all();
         //$posts=Posts::all();

        //return view('posts.index', compact('posts'));

        return redirect('posts');
        //return $input;
    }
}
