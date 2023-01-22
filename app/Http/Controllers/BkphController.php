<?php

namespace App\Http\Controllers;

use App\Models\Bkph;
use Illuminate\Http\Request;

class BkphController extends Controller
{
    public function index()
    {
        return view('bkph.index',[
            'title' => 'Bkph',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bkph' => ['required|max:255'],
            'alamat_bkph' => ['required'],
            'no_telepon' => ['required'],
        ]);

        Feedback::create($validatedData);

        return redirect('/bkph')->with('success','Feedback Sent!');
    }
}
