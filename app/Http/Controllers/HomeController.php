<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TmDataArticle;

class HomeController extends Controller
{   

    public function updateViews($id)
    {
        try {
            DB::beginTransaction();
            
            // Find the record by ID
            $data = TmDataArticle::findOrFail($id);

            // Update the 'views' column
            $data->views += 1;
            $data->save();

            DB::commit();

            // Redirect back to the page or perform any other action
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            $data = [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];

            return ResponseFormatter::error($data);
        }
    }
    public function index(){
    
    $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();



        return view('home.index',compact('data','trending','popular'));
    }
    public function profil(){
    $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();



        return view('home.profile',compact('data','trending','popular'));
    }
    public function mars(){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.mars',compact('data','trending','popular'));
    }
    public function logo(){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.logo',compact('data','trending','popular'));
    }
    public function lokasi(){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.lokasi',compact('data','trending','popular'));
    }
    public function tekpram(){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.tekpram',compact('data','trending','popular'));
    }
    public function proker(){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.proker',compact('data','trending','popular'));
    }
    public function bidang(){
        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.bidang',compact('data','trending','popular'));
    }
    public function kir(){
        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.kir',compact('data','trending','popular'));
    }
    public function fbs(){
        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.fbs',compact('data','trending','popular'));
    }
    public function kelompok(){
        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();

    $data = TmDataArticle::with('categories')->where('status', 1)->get();

    $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        return view('home.kelompok',compact('data','trending','popular'));
    }

    public function join(){

        return view('home.join');
    }

    public function detail($id){

        $trending = TmDataArticle::with('categories')->where('status', 1)->latest()->first();
        $item = TmDataArticle::with('categories')->where('status', 1)->where('id',$id)->first();
        $popular = TmDataArticle::with('categories')
                    ->where('status', 1)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();



        return view('home.detail',compact('item','trending','popular'));
    }
}