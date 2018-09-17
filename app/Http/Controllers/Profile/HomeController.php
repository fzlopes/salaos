<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (!Auth::user()->first_access) {
            $user = User::find(Auth::user()->id);
            $user->first_access = true;
            $user->save();
        }

        $usuarios = User::where('is_active', true)
            ->where('id', '!=', 1)
            ->get()
            ->count();

        return view('profile.dashboard')->with(compact('usuarios'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        $user = User::find(Auth::user()->id);
        return view('profile.profile')->with(compact('user'));
    }


}
