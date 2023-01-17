<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DashboardFeedbackController extends Controller
{

    public function index()
    {
        return view('dashboard.feedback.index',[
            'feedbacks' => Feedback::all()
        ]);
    }

    public function show(Feedback $feedback)
    {
        return view('dashboard.feedback.show',[
            'feedback' => $feedback
        ]);
    }

    public function destroy(Feedback $feedback)
    {
        Feedback::destroy($feedback->id);
        return redirect('/dashboard/feedbacks')->with('success', 'Feedback has been deleted');
    }
}
