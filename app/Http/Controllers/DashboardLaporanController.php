<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Laporan;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardLaporanController extends Controller
{

    public function index()
    {
        return view('dashboard.laporans.index', [
            'laporans' => Laporan::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.laporans.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('laporan-images');
        }

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
    }

    public function update(Request $request, Laporan $laporan)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('laporan-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Laporan::where('id', $laporan->id)->update($validatedData);

        return redirect('/dashboard/laporans')->with('success', 'Laporan has been updated');
    }

    public function destroy(Laporan $laporan)
    {
        // if($laporan->image){
        //     Storage::delete($laporan->image);
        // }
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
        // $laporan = Laporan::onlyTrashed()->where('id', $laporanId)->get();
        // if($laporan->image){
        //     Storage::delete($laporan->image);
        // }
        Laporan::onlyTrashed()->find($laporanId)->forceDelete();
        return redirect('/dashboard/laporans/recycle')->with('success', 'Laporan has been deleted');
    }
}
