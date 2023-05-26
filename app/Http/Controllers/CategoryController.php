<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TmRefCategory;

class CategoryController extends Controller
{
    public function index()
    {

        $data = TmRefCategory::with('categories')->get();

        $dataVerif = $data->where('status', '1');

        $totalVerif = $dataVerif->count();
        $total = $data->count();

    

        

        return view('admin.category-index', compact('data','total','totalVerif') );
    }

    public function show($id)
    {
        $anggota = TmRefCategory::where('id', $id)->first();
        
        return view('admin.category-show', compact('anggota', 'lampiran'));
    }

    public function create()
    {
        return view('admin.category-create');
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

            
        return view('admin.category-edit', compact('anggota'));
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
            return response()->json(['success' => true, 'message' => 'Sukses approve data']);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . $exception->getTraceAsString());
            
            Session::flash('error', 'Gagal Edit data');
            return redirect()->back();
        }
    }

}
