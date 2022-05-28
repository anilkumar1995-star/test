<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
          
        return view('users', compact('users'));
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
                       // ->where('max_income', '<', $user->max_income)
        if ($user->gender == 'male') {
            $users->where('gender', '=', 'female'); 
        }
        $users->orderBy('min_income', 'DESC');
        $users = $users->get();
          
        return view('users', compact('users'));
    }
}
