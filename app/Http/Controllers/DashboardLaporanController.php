<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\Bkph;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardLaporanController extends Controller
{

    public function index()
    {
        return view('dashboard.laporans.index', [
            'laporans' => Laporan::all(), 'bkphs' => Bkph::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.laporans.create',[
            'categories' => Category::all(), 'bkphs' => Bkph::all()
            
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'bkph_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Laporan::create($validatedData);

        return redirect('/dashboard/laporans')->with('success', 'New Laporan has been added');
    }

    public function show(Laporan $laporan)
    {
        return view('dashboard.laporans.show',[
            'laporan' => $laporan
        ]);
    }

    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporans.edit',[
            'laporan' => $laporan,
            'categories' => Category::all()
        ]);
        return view('dashboard.laporans.edit',[
            'laporan' => $laporan,
            'bkphs' => Bkph::all()
        ]);
    }

    public function update(Request $request, Laporan $laporan)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'bkph_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Laporan::where('id', $laporan->id)->update($validatedData);

        return redirect('/dashboard/laporans')->with('success', 'Laporan has been updated');
    }

    public function destroy(Laporan $laporan)
    {

        Laporan::destroy($laporan->id);
        return redirect('/dashboard/laporans')->with('success', 'Laporan has been deleted');
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
