<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index() {
        return view('category', [
            'title' => 'Courses',
            'categories' => Category::paginate(6)
        ]);
    }

    public function show(Category $category){
        return view('courses', [
            'title' => $category->name,
            'courses' => $category->courses
        ]);
    }

    public function getCourse(Course $course){
        return view('course', [
            'title' => $course->title,
            'course' => $course
        ]);
    }
}
