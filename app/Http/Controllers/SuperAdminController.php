<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

    public function index()
    {
        $this->authorize('superadmin');
        return view('dashboard.administrator.index',[
            'users' => User::where('is_super', 0)->get()
        ]);
    }

    public function create()
    {
        $this->authorize('superadmin');
        return view('dashboard.administrator.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'username' => ['required','min:5','max:255','unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/dashboard/users')->with('success','New Admin has been added');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'Admin has been deleted');
    }

    public function recycle(){
        return view('dashboard.administrator.recycle', [
            'users' => User::onlyTrashed()->get()
        ]);
    }

    public function restore($courseId)
    {
        User::onlyTrashed()->find($courseId)->restore();
        return redirect('/dashboard/users/recycle')->with('success', 'Admin has been restored');
    }

    public function delete($userID)
    {
        User::onlyTrashed()->find($userID)->forceDelete();
        return redirect('/dashboard/users/recycle')->with('success', 'Admin has been deleted');
    }
}
