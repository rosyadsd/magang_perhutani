<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardCourseController extends Controller
{

    public function index()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.courses.create',[
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
            $validatedData['image'] = $request->file('image')->store('course-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Course::create($validatedData);

        return redirect('/dashboard/courses')->with('success', 'New Course has been added');
    }

    public function show(Course $course)
    {
        return view('dashboard.courses.show',[
            'course' => $course
        ]);
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit',[
            'course' => $course,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Course $course)
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
            $validatedData['image'] = $request->file('image')->store('course-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Course::where('id', $course->id)->update($validatedData);

        return redirect('/dashboard/courses')->with('success', 'Course has been updated');
    }

    public function destroy(Course $course)
    {
        // if($course->image){
        //     Storage::delete($course->image);
        // }
        Course::destroy($course->id);
        return redirect('/dashboard/courses')->with('success', 'Course has been deleted');
    }

    public function recycle()
    {
        return view('dashboard.courses.recycle', [
            'courses' => Course::onlyTrashed()->get()
        ]);
    }

    public function restore($courseId)
    {
        Course::onlyTrashed()->find($courseId)->restore();
        return redirect('/dashboard/courses/recycle')->with('success', 'Course has been restored');
    }

    public function delete($courseId)
    {
        // $course = Course::onlyTrashed()->where('id', $courseId)->get();
        // if($course->image){
        //     Storage::delete($course->image);
        // }
        Course::onlyTrashed()->find($courseId)->forceDelete();
        return redirect('/dashboard/courses/recycle')->with('success', 'Course has been deleted');
    }
}
