<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\Bkph;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DashboardLaporanController extends Controller
{

    public function index()
    {
        return view('dashboard.laporans.index', [
            'laporans' => Laporan::all(), 
            'categories' => Category::all(), 
            'bkphs' => Bkph::all(),
            'bulans' => Bulan::all(),
        

        ]);
    }
    

    public function create()
    {


        return view('dashboard.laporans.create',[
            'categories' => Category::all(), 
            'bkphs' => Bkph::all(),
            'bulans' => Bulan::all(),

            
        ]);
    }

    // public function export()
    // {
    //     // return view('dashboard.laporans.export',[
    //     //     'categories' => Category::all(), 
    //     //     'bkphs' => Bkph::all(),

            
    //     // ]);
    // }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'bkph_id' => 'required',
            'bulan_id' => 'required',
            'rkap' => 'required|numeric',
            'ro' => 'required|numeric',
            'real' => 'required|numeric',
            'persen_rkap' => 'required|numeric',
            'persen_ro' => 'required|numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Laporan::create($validatedData);

        return redirect('/dashboard/laporans')->with('success', 'New Laporan has been added');
    }

    public function jumlahdata(Laporan $laporan,Category $category )
    {
        $datas = Laporan::all();
        $data = [];
        $real= [];
        $rkap= [];
        $ro= [];
        $persenro= [];
        $persenrkap= [];
        
        // Memasukan nilai ke masing-masing bkph sesuai dengan indeks bkph_id
        $category_id =$laporan->category_id;
        $kategori = Category::where('name', $category_id);
        // dd($kategori);
        foreach($datas  as $data)
        {
            if($data->category_id == $category_id) {
                $real[] = $data->real;
                $rkap[] = $data->rkap;
                $ro[] = $data->ro;
            }

        }
        $jumlahreal = array_sum($real);
        $jumlahrkap = array_sum($rkap);
        $jumlahro = array_sum($ro);
        $hasilpersenrkap = ($jumlahreal / $jumlahrkap) * 100 ;
        $persentaserkap = number_format($hasilpersenrkap, 2) . '%';
        $hasilpersenro = ($jumlahreal / $jumlahro) * 100 ;
        $persentasero = number_format($hasilpersenro, 2) . '%';
       
        // Cek nilai kosong, jika kosong dinilai 0

        // dd($jumlahreal);
        return view('dashboard.laporans.jumlahdata',[
            'categories' => Category::all(),
            'bkphs' => Bkph::all(),
            'kategori' => $kategori,
            'datas' => $datas,
            'title' => $category->name,
            'ratareal' => $jumlahreal,
            'ratapersenro' => $persentasero,
            'ratapersenrkap' => $persentaserkap,
            'ratarkap' => $jumlahrkap,
            'rataro' => $jumlahro,
 
        ]);
    }

    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporans.edit',[
            'laporan' => $laporan,
            'categories' => Category::all(),
            'bkphs' => Bkph::all(),
            'bulans' => Bulan::all(),
        ]);

    }

    public function update(Request $request, Laporan $laporan)
    {
        
        $validatedData = $request->validate([
            'category_id' => 'required',
            'bkph_id' => 'required',
            'bulan_id' => 'required',
            'rkap' => 'required|numeric',
            'ro' => 'required|numeric',
            'real' => 'required|numeric',
            'persen_rkap' => 'required|numeric',
            'persen_ro' => 'required|numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Laporan::where('id', $laporan->id)->update($validatedData);

        return redirect('/dashboard/laporans')->with('success', 'Laporan Telah Berhasil Diperbarui');
    }

    public function destroy(Laporan $laporan)
    {

        Laporan::destroy($laporan->id);
        return redirect('/dashboard/laporans')->with('success', 'Laporan Telah Berhasil Dihapus');
    }

    public function recycle()
    {
        return view('dashboard.laporans.recycle', [
            'laporans' => Laporan::onlyTrashed()->get()
        ]);
    }

    public function restore($laporanId)
    {
        Laporan::onlyTrashed()->find($laporanId)->restore();
        return redirect('/dashboard/laporans/recycle')->with('success', 'Laporan has been restored');
    }

    public function delete($laporanId)
    {

        Laporan::onlyTrashed()->find($laporanId)->forceDelete();
        return redirect('/dashboard/laporans/recycle')->with('success', 'Laporan has been deleted');
    }
}
