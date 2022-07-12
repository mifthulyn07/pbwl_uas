<?php
namespace App\Http\Controllers;

use App\Models\Daftarbuku;
use App\Models\Daftarpenjualan;
use Illuminate\Http\Request;

class DaftarpenjualanController extends Controller{
    public function index()
    {   
        $daftarpenjualan = Daftarpenjualan::all();
        $daftarbuku = Daftarbuku::all();
        return view('daftarpenjualan.index', compact(['daftarpenjualan']), compact(['daftarbuku']));
        
    }
     
    public function store(Request $request){//tambah
        Daftarpenjualan::create([
            'jual_id_buku'      => $request->jual_id_buku,
            'jual_jml'          => $request->jual_jml
        ]);
        return redirect('/daftarpenjualan');
    }

    public function update($id, Request $request){//ubah 
        $daftarpenjualan = Daftarpenjualan::findOrFail($id);
        $daftarpenjualan->update([
            'jual_id_buku'      => $request->jual_id_buku,
            'jual_jml'          => $request->jual_jml
        ]);
        return redirect('/daftarpenjualan');
    }

    public function destroy($id){//hapus  
        $daftarpenjualan = Daftarpenjualan::find($id);  
        $daftarpenjualan->delete(); 

        return redirect('/daftarpenjualan');
    }  

    public function search(Request $request){//cari
        $search = $request->search;

        $daftarpenjualan = Daftarbuku::where('bk_judul', 'like', '%' . $search . '%')->paginate();

        return view('daftarpenjualan.index', compact(['daftarpenjualan']));
    }
}
