<?php

namespace App\Http\Controllers;

use App\Models\Bkph;
use Illuminate\Http\Request;
use App\Models\Laporan;

class DashboardBkphController extends Controller
{

    public function index()
    {
        return view('dashboard.bkph.index', [
            'bkphs' => Bkph::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.bkph.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bkph' => 'required|max:255',
            'alamat_bkph' => 'required',
            'email' => 'required',
        ]);

        Bkph::create($validatedData);

        return redirect('/dashboard/bkphs')->with('success', 'BKPH Baru Telah Berhasil Ditambahkan');
    }

    public function edit(Bkph $bkph)
    {
        return view('dashboard.bkph.edit',[
            'bkphs' => $bkph
        ]);
    }

    public function update(Request $request, Bkph $bkph)
    {
        
        $validatedData = $request->validate([
            'nama_bkph' => 'required|max:255',
            'alamat_bkph' => 'required',
            'email' => 'required',
        ]);

        Bkph::where('id', $bkph->id)->update($validatedData);
        return redirect('/dashboard/bkphs')->with('success', 'BKPH Telah Berhasil Diperbarui');
    }

    public function destroy(Bkph $bkph)
    {
        Bkph::destroy($bkph->id);
        return redirect('/dashboard/bkphs')->with('success', 'BKPH Telah Berhasil Dihapus');
    }

    public function recycle()
    {
        return view('dashboard.bkph.recycle', [
            'bkphs' => Bkph::onlyTrashed()->get()
        ]);
    }

    public function restore($bkphId)
    {
        Bkph::onlyTrashed()->find($bkphId)->restore();
        return redirect('/dashboard/bkphs/recycle')->with('success', 'BKPH Telah Berhasil Dikembalikan');
    }

    public function delete($bkphId)
    {
        Bkph::onlyTrashed()->find($bkphId)->forceDelete();
        return redirect('/dashboard/bkphs/recycle')->with('success', 'BKPH Telah Berhasil Dihapus');
    }
}
