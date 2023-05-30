<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TmDataPendaftar;

class PendaftarController extends Controller
{
    public function list(Request $request)
    {
        $data = TmDataPendaftar::all();

        return collect($data)->map->only(['id', 'name'])->all();

    }
    public function index()
    {

        $data = TmDataPendaftar::get();

        $dataVerif = $data->where('status', '1');

        
        
        $totalVerif = $dataVerif->count();
        $total = $data->count();

    

        

        return view('admin.pendaftar-index', compact('data','total','totalVerif') );
    }

    public function show($id)
    {
        $anggota = TmDataPendaftar::where('id', $id)->first();
        
        return view('admin.pendaftar-show', compact('anggota'));
    }

    public function create()
    {
        return view('article.pendaftar-create');
    }


    public function publish($id)
    {
        $anggota = TmDataPendaftar::where('id', $id)->first();
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
        $anggota = TmDataPendaftar::where('id', $id)->first();

            
        return view('admin.pendaftar-edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $newdata = TmDataPendaftar::where('id', $id)->first();
        DB::beginTransaction();

        try {
            $data = $request->all();
            $newdata->update($data);
            DB::commit();
            
            Session::flash('success', 'Sukses Edit data');
            return response()->json(['success' => true, 'message' => 'Sukses edit data']);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . $exception->getTraceAsString());
            
            Session::flash('error', 'Gagal Edit data');
            return redirect()->back();
        }
    }
}
