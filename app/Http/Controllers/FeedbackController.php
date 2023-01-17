<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index',[
            'title' => 'Feedback',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'type' => ['required'],
            'body' => ['required']
        ]);

        Feedback::create($validatedData);

        return redirect('/feedback')->with('success','Feedback Sent!');
    }
}
