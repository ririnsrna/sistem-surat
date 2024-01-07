<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index(Request $request)
    {
        $pagination  = 5;
        $disposisi    = Disposisi::when($request->keyword, function ($query) use ($request) { 
        $query->where('no_surat', 'or', 'ditujukan', 'or', 'pengirim', 'like', "%{$request->keyword}%");
        })->orderBy('no_surat', 'asc')->paginate($pagination);

        $disposisi->appends($request->only('keyword'));

        return view('pages.disposisi', [
            'disposisi' => $disposisi,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function destroy($id)
    {
        $data = Disposisi::find($id);
        $data-> delete();
        return redirect('disposisi')->with('statusHapus','Data Berhasil Di Hapus');
    }
}
