<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TmDataArticle;
use App\Models\TmDataPendaftar;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'nim' => 'nullable|string',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'ukuran_baju' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();
            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public');
                $imageUrl = Storage::disk('public')->url($imagePath);
            }

            // Format the tanggal_lahir field using Carbon
            $tanggalLahir = Carbon::createFromFormat('d/m/Y', $valid['tanggal_lahir'])->format('Y-m-d');

            // CREATE TM DATA PANITIA
            $panitia = TmDataPendaftar::create([
                'name' => $valid['name'],
                'email' => $valid['email'],
                'nim' => $valid['nim'],
                'no_telepon' => $valid['no_telepon'],
                'jenis_kelamin' => $valid['jenis_kelamin'],
                'tanggal_lahir' => $tanggalLahir,
                'ukuran_baju' => $valid['ukuran_baju'],
                'alamat' => $valid['alamat'],
                'image_url' => $imageUrl ?? null,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Submit successful',
                'success' => true,
                'data' => $panitia,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'success' => false,
            ], 500);
        }
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