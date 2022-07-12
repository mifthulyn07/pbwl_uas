<?php
namespace App\Http\Controllers;

use App\Models\Daftarbuku;
use App\Models\Jenisbuku;
use Illuminate\Http\Request;

class DaftarbukuController extends Controller{
    public function index()
    {   
        $daftarbuku = Daftarbuku::all();
        $jenisbuku = Jenisbuku::all();
        return view('daftarbuku.index', compact(['daftarbuku']), compact(['jenisbuku']));
        
    }
     
    public function store(Request $request){//tambah
        Daftarbuku::create([
            'bk_judul'      => $request->bk_judul,
            'bk_pengarang'  => $request->bk_pengarang,
            'bk_id_jenis'   => $request->bk_id_jenis,
            'bk_harga'      => $request->bk_harga
        ]);
        return redirect('/daftarbuku');
    }

    public function update($id, Request $request){//ubah 
        $daftarbuku = Daftarbuku::findOrFail($id);
        $daftarbuku->update([
            'bk_judul'      => $request->bk_judul,
            'bk_pengarang'  => $request->bk_pengarang,
            'bk_id_jenis'   => $request->bk_id_jenis,
            'bk_harga'      => $request->bk_harga
        ]);

        return redirect('/daftarbuku');
    }

    public function destroy($id){//hapus  
        $daftarbuku = Daftarbuku::find($id);  
        $daftarbuku->delete(); 

        return redirect('/daftarbuku');
    }  

    public function search(Request $request){//cari
        $search = $request->search;

        $daftarbuku = Daftarbuku::where('bk_judul', 'like', '%' . $search . '%')->paginate();

        return view('daftarbuku.index', compact(['daftarbuku']));
    }
}
