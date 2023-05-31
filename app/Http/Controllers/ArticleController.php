<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TmDataArticle;
use App\Models\TmRefCategory;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $data = TmRefCategory::all();

        return collect($data)->map->only(['id', 'name'])->all();

    }
    public function index()
    {

        $data = TmDataArticle::with('categories')->get();

        $dataVerif = $data->where('status', '1');

        
        
        $totalVerif = $dataVerif->count();
        $total = $data->count();

    

        

        return view('admin.article-index', compact('data','total','totalVerif') );
    }

    public function show($id)
    {
        $anggota = TmDataArticle::where('id', $id)->first();
        
        return view('article.article-show', compact('anggota'));
    }

    public function create()
    {
        return view('article.article-create');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'categories_id' => 'required',
            'created_by' => 'required',
            'views' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();
            // Create slug from the name
            $slug = Str::slug($valid['name']);
            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public');
                $imageUrl = Storage::disk('public')->url($imagePath);
            }

            // CREATE TM DATA PANITIA
            $panitia = TmDataArticle::create([
                'name' => $valid['name'],
                'slug' => $slug,
                'description' => $valid['description'],
                'categories_id' => $valid['categories_id'],
                'created_by' => $valid['created_by'],
                'views' => $valid['views'],
                'image_url' => $imageUrl ?? null,
            ]);
            
            DB::commit();
            
            return ResponseFormatter::success($panitia);
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

    public function publish($id)
    {
        $anggota = TmDataArticle::where('id', $id)->first();
        $date = date('Y-m-d');
        $user = auth()->user();
        $update = [
            'status' => 1,
            'updated_at' => $date,
        ];

        $anggota->update($update);

        Session::flash('success', 'Sukses publish artikel');
        return redirect()->back();
    }

    public function delete($id)
    {
        $anggota = TmDataArticle::where('id', $id)->first();

        $anggota->delete();

        Session::flash('success', 'Sukses delete artikel');
        return redirect()->back();
    }

    public function edit($id){
        $anggota = TmDataArticle::with('categories')->where('id', $id)->first();

            
        return view('article.article-edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $newdata = TmDataArticle::where('id', $id)->first();
        DB::beginTransaction();

        try {
            $data = $request->all();
            $newdata->update($data);
            DB::commit();
            
            Session::flash('success', 'Sukses Edit data');
            return redirect()->back();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . $exception->getTraceAsString());
            
            Session::flash('error', 'Gagal Edit data');
            return redirect()->back();
        }
    }

}
