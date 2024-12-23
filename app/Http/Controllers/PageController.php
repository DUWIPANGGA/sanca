<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $articles= article::all();
        return view('template.monitoring2',compact(['articles']));
    }
    public function monitoring(){
        $articles= article::all();
        return view('template.monitoring2',compact(['articles']));
    }
}
