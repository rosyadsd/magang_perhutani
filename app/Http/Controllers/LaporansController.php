<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Bkph;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporansController extends Controller
{
    public function index() {
        return view('category', [
            'title' => 'Laporans',
            'categories' => Category::paginate(6)
        ]);
        return view('bkph', [
            'title' => 'Laporans',
            'bkphs' => Bkph::paginate(6)
        ]);
    }
    
    public function show(Category $category,){
        return view('laporans', [
            'title' => $category->name,
            'laporans' => $category->laporans
        ]);
    }

    public function getLaporan(Laporan $laporan){
        return view('laporan', [
            'title' => $laporan->title,
            'laporan' => $laporan
        ]);
    }
}
