<?php

namespace App\Http\Controllers;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Category;
use App\Models\Course;
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
            'name' => ['required','max:255'],
            'slug' => ['required','unique:categories'],
            'excerpt' => ['required']
        ]);

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
        $rules = [
            'name' => ['required','max:255'],
            'slug' => ['required','unique:categories'],
            'excerpt' => ['required']
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = ['required','unique:categories'];
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success','Category has been updated!');
    }

    public function destroy(Category $category)
    {
        Course::destroy($category->courses);
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }

    public function fillSlug(Request $request){

        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
