<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    //

    public function contact(){

        return view('pages.contact');
    }

     public function me(){

        return view('pages.me');
    }
}
