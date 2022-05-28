<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select("*")
                        
                        ->orderBy('id', 'DESC')
                        ->get();
          
        return view('home', compact('users'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function partner(Request $request)
    {
        $user = Auth::user();
        $users = User::select("*");
        
        $users->where('min_income', '>', $user->min_income);
        if ($user->gender == 'male') {
            $users->where('gender', '=', 'female'); 
        }
        $users->orderBy('min_income', 'DESC');
        $users = $users->get();
          
        return view('home', compact('users'));
    }
}
