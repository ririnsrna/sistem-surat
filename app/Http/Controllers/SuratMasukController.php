<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Disposisi;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SuratMasukExport;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {

        $pagination  = 5;
        $productss    = Suratmasuk::when($request->input('date') && $request->input('date_end'), function ($query) use ($request) { 
            $start_date = Carbon::parse($request->input('date'));
            $end_date = Carbon::parse($request->input('date_end'));
            return $query->whereBetween('tanggal_surat', [$start_date, $end_date]);
        })->orderBy('tanggal_surat', 'asc')->paginate($pagination);


        // $productss->when(, function ($query) use ($request) {
            
        // });

        // $productss->appends($request->only('keyword'));

        return view('pages.suratmasuk', [
            'productss' => $productss,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function Detail($id)
    {

        $data = Suratmasuk::find($id);
        return view('pages.detail',compact('data'));
    }

    public function create()
    {
        
        return view('form.createmasuk');
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'no_surat' => 'required|unique:Suratmasuks,no_surat,',
            'tanggal_surat' => 'required',
            'pengirim' => 'required',
            'ditujukan' => 'required',
            'perihal' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('assets/file',$file->getClientOriginalName());

        $upload = new Suratmasuk;
        $upload->file = $nama_file;
        $upload->no_surat = $request->no_surat;
        $upload->tanggal_surat = $request->tanggal_surat;
        $upload->pengirim = $request->pengirim;
        $upload->ditujukan = $request->ditujukan;
        $upload->perihal = $request->perihal;
        $upload->keterangan = $request->keterangan;
        $upload->tanggapan = $request->tanggapan;
        $upload->status = $request->status;

        $upload->save();

        return redirect('/suratmasuk')->with('status', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $data = Suratmasuk::find($id);
        return view('form.updatemasuk',compact('data'));
    }

    public function update(Request $request,$id)
    {

        $data = Suratmasuk::find($id);

        $this->validate($request, [
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'tanggal_surat' => 'required',
            'pengirim' => 'required',
            'ditujukan' => 'required',
            'perihal' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('assets/file',$file->getClientOriginalName());

        $data-> update([
            'no_surat' => $request->no_surat,
            'jenis_surat' => $request->jenis_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'pengirim' => $request->pengirim,
            'ditujukan' => $request->ditujukan,
            'perihal' => $request->perihal,
            'file' => $nama_file
        ]);

        return redirect('/suratmasuk')->with('statusUbah', 'Data Berhasil Di Ubah');
    }
    public function editDisposisi($id)
    {
        $disposisi = Suratmasuk::find($id);
        return view('form.disposisimasuk',compact('disposisi'));
    }

    public function updateDisposisi(Request $request,$id)
    {

        $disposisi = Suratmasuk::find($id);

        if ($disposisi->status == 'Belum Disposisi') {
            $disposisi->update([
                'status' => 'Sudah Disposisi'
            ]);

            Disposisi::create([
                'no_surat' => $disposisi->no_surat,
                'perihal' => $disposisi->perihal,
                'ditujukan' => $disposisi->ditujukan,
                'isi_disposisi' => $request->isi_disposisi,
                'keterangan' => $request->keterangan,
            ]);
        }else{
            $disposisi = Disposisi::where('no_surat', $disposisi)->first();
            dd($disposisi);
            $disposisi->update([
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'tanggapan' => $request->tanggapan
               
             ]);
        }

        $this->validate($request, [
            'status' => 'required',
            'keterangan' => 'required',
            'tanggapan' => 'required'
        ]);

        

        return redirect('/suratmasuk')->with('statusDisposisi', 'Data Berhasil Di Disposisi');
    }

    public function destroy($id)
    {
        $data = Suratmasuk::find($id);
        $data-> delete();
        return redirect('suratmasuk')->with('statusHapus','Data Berhasil Di Hapus');
    }

    public function ekspor(Request $request)
    {
        $suratmasuk = SuratMasuk::whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59'])->get();

        if ($request->type == 'pdf') {
            $tanggal = Carbon::now();
            $pdf = Pdf::loadView('pdf.masuk', compact('suratmasuk'));
            return $pdf->download('invoice-('. $tanggal .').pdf');
        }else{
            return Excel::download(new SuratMasukExport($request->start_date, $request->end_date), 'SuratMasuk.xlsx');
        }
       
    }
}
