<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('dashboard.change-password.index');
    }

    public function changePassword(Request $request)
    {       
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|string|confirmed',
        ]);

        $currentPassword = auth()->user()->password;
        $oldPassword = $request->old_password;
        
        if (Hash::check($oldPassword, $currentPassword)) {
            $id = auth()->user()->id;
            User::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
    
            return back()->with('success','password successfully updated');
        }else{
            return back()->with('warning','Password not match');
        }
    }
}
