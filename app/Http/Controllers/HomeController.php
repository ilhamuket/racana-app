<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function about(){
        return view('home.about');
    }
    public function blog(){
        return view('home.blog');
    }
    public function categori(){
        return view('home.categori');
    }
    public function contact(){
        return view('home.contact');
    }
    public function details(){
        return view('home.details');
    }
    public function elements(){
        return view('home.elements');
    }
    public function latestNews(){
        return view('home.latest_news');
    }
    public function main(){
        return view('home.main');
    }
    public function singleBlog(){
        return view('home.single_blog');
    }
}
