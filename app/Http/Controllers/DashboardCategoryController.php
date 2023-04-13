<?php

namespace App\Http\Controllers;
// use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Category;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index',[
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required','max:255',
            'keterangan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'required',
            'satuan' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $validatedData['image'] = $filename;
        }

        Category::create($validatedData);

       
        return redirect('/dashboard/categories')->with('success','Kategori Baru Telah Berhasil Ditambahkan!');
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'keterangan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'required',
            'satuan' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Upload image
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
           
        // Delete image
        if (isset($validatedData['image'])) {
            Storage::delete('public/images/' . $validatedData['image']);
        }

            $validatedData['image'] = $filename;
        }

        
    
        $category->update($validatedData);
        

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('sukses','Kategori Telah Berhasil Diperbarui');
    }

    public function destroy(Category $category)
    {
        Laporan::destroy($category->laporans);
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Kategori Telah Berhasil Dihapus');
    }

}
