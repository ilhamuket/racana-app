<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TmRefCategory;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $data = TmRefCategory::all();

        return collect($data)->map->only(['id', 'name'])->all();

    }
    public function index()
    {

        $data = TmRefCategory::get();

        $dataVerif = $data->where('status', '1');

        
        
        $totalVerif = $dataVerif->count();
        $total = $data->count();

    

        

        return view('admin.category-index', compact('data','total','totalVerif') );
    }

    public function show($id)
    {
        $anggota = TmRefCategory::where('id', $id)->first();
        
        return view('admin.category-show', compact('anggota'));
    }

    public function create()
    {

       

        return view('kategori.category-add');
    }


    public function publish($id)
    {
        $anggota = TmRefCategory::where('id', $id)->first();
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

    public function edit($id){
        $anggota = TmRefCategory::where('id', $id)->first();

            
        return view('kategori.category-edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $newdata = TmRefCategory::where('id', $id)->first();
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

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            // Create slug from the name
            $slug = Str::slug($valid['name']);
            // CREATE TM DATA PANITIA
            $panitia = TmRefCategory::create([
                'name' => $valid['name'],
                'slug' => $slug,
                'status' => 1,
            ]);
            
            DB::commit();
            
            Session::flash('success', 'Sukses publish kategori');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            $data = [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];

            Session::flash('error', 'Gagal publish kategori');
        return redirect()->back();
        }
    }

    public function delete($id)
    {
        $anggota = TmRefCategory::where('id', $id)->first();

        $anggota->delete();

        Session::flash('success', 'Sukses delete artikel');
        return redirect()->back();
    }

}
