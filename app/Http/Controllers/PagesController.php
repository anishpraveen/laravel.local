<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

    public function about(){
        //$name='<span style="color:red;">anish</span>';
        $arr=[];
        $arr['name']='abc';
        $arr['age']=16;
        //return view('pages.about')->with('name',$name);
        return view('pages.about',$arr);
    }
}
