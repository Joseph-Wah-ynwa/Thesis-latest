<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
       
        $data=Article::orderBy('id','desc')->get();
        return view('product.index')->with('datas',$data);
    }
}
