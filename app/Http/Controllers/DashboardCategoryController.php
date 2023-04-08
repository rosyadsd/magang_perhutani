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
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $validatedData['image'] = $filename;
        }

        Category::create($validatedData);

       
        return redirect('/dashboard/categories')->with('success','New Category has been added!');
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
            // delete the old image file
            // Storage::delete('storage/images/' . $category->image);


            $validatedData['image'] = $filename;
        }

        
    
        $category->update($validatedData);
        
        // $rules = [
        //     'name' => ['required','max:255'],
        //     'excerpt' => ['required']
        // ];

        // if($request->slug != $category->slug){
        //     $rules['slug'] = ['required','unique:categories'];
        // }

        // $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success','Category has been updated!');
    }

    public function destroy(Category $category)
    {
        Laporan::destroy($category->laporans);
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }

    // public function fillSlug(Request $request){

    //     $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

    //     return response()->json(['slug' => $slug]);
    // }
}
