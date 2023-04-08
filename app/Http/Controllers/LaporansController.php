<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Bkph;
use App\Models\Category;
use App\Models\Bulan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LaporansController extends Controller
{
    public function index() {
        return view('category', [
            'title' => 'Laporans',
            'categories' => Category::paginate(12),
            'Bulan' => Bulan::paginate(12),
        ]);
    }
    
    // public function showbulan(Category $category,Bulan $bulan){
    //     $category_id = $category->id;
    //     $datas = Bulan::all();
    //     return view('bulans', [
    //         'title' => $bulan->nama_bulan,
    //         'datas' => $datas,
    //         'Bulans' => Bulan::paginate(12),
    //         'category' => Category::findOrFail($category_id),
    //     ]);
    // }
    public function show(Laporan $laporan,Category $category,)
    {
        $category_id = $category->id;
        // $kategori = $category;
        // $bulans = $kategori->bulans()->where('category_id', $category_id)->get();
        
        $daftarbkph = Bkph::all();
        $datalaporan = Laporan::all();
        $daftarbulan = Bulan::all();
        
        $databkph = [];
        $databulan = [];
        $data = [];
        $real= [];
        $rkap= [];
        $ro= [];
        
        $kategorireal= [];
        $kategorirkap= [];
        $kategoriro= [];
        $totalrkap= [];

        $hasilpersenrkap=[];
        $hasilpersenro=[];


        $datas = Laporan::with('bkph')
                    ->where('category_id', $category_id)
                    // ->where('bulan_id', $bulan_id)
                    ->orderBy('bkph_id')
                    ->get();
        // dd($daftarbkph);
        // Memasukan nilai ke masing-masing bkph sesuai dengan indeks bkph_id
        foreach($datas as $data)
        {

            $real[$data->bkph_id-1] = $data->real;
            $ro[$data->bkph_id-1] = $data->ro;
            $rkap[$data->bkph_id-1] = $data->rkap;

            $kategorireal[] = $data->real;
            $kategorirkap[] = $data->rkap;
            $kategoriro[] = $data->ro;
            $totalrkap[] = $data->rkap;
        }
            $jumlahreal = array_sum($kategorireal);
            $jumlahrkap = array_sum($kategorirkap);
            $jumlahro = array_sum($kategoriro);
            $jumrkap[] = array_sum($totalrkap);
            $hasilpersenrkap [] = ($jumlahreal / $jumlahrkap) * 100 ;
            $hasilpersenro[] = ($jumlahreal / $jumlahro) * 100 ;
        

        
        // dd($persentaserkap);
        // Looping nama bkph
        foreach ($daftarbkph as $bkph) {
            $databkph[] = $bkph->nama_bkph;
        }
        foreach ($daftarbulan as $bulan) {
            $databulan[] = $bulan->nama_bulan;
        }

        // Cek nilai kosong, jika kosong dinilai 0
        $real_new = [];
        for ($i=0; $i < count($databkph); $i++) { 
            if (isset($real[$i]) === TRUE) {
                $real_new[] = $real[$i];
            } else {
                $real_new[] = '0';
            }
        }

        // Cek nilai kosong, jika kosong dinilai 0
        $ro_new = [];
        for ($i=0; $i < count($databkph); $i++) { 
            if (isset($ro[$i]) === TRUE) {
                $ro_new[] = $ro[$i];
            } else {
                $ro_new[] = '0';
            }
        }

        // Cek nilai kosong, jika kosong dinilai 0
        $rkap_new = [];
        for ($i=0; $i < count($databkph); $i++) { 
            if (isset($rkap[$i]) === TRUE) {
                $rkap_new[] = $rkap[$i];
            } else {
                $rkap_new[] = '0';
            }
        }
        // dd($hasilpersenrkap);
        // dd(json_encode($real));
        // dd(json_encode($hasilpersenrkap));
        return view('laporans', [
            'title' => $category->name,
            'keterangan' => $category->keterangan,
            'datas' => $datas,
            'bkph' => $databkph,
            'real' => $real_new,
            'ro' => $ro_new,
            'rkap' => $rkap_new,
            'hasilpersenrkap' => $hasilpersenrkap,
            'hasilpersenro' => $hasilpersenro,
            'jumrkap' => $jumrkap,
            
        ]);
    }

}