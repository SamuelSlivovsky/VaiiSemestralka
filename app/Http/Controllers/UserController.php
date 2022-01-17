<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('profil', ['users' => $user->where('id',  Auth::id())]);
    }

    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request)
    {

        $request->validate(['name' => 'required', 'email' => 'required|email']);
        $updating = DB::table('users')->where('id', Auth::id())->update(['name' => $request->input('name'), 'email' => $request->input('email')]);

        return redirect('profil');
    }
    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {

        $delete = DB::table('users')->where('id', Auth::id())->delete();
        return redirect('/');
    }
}
