<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\ResAction;
use App\ResDomaine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //
    public function index(){
        $admin=User::all();
        return view('dashboard.dash-admin',['admin'=>$admin]);
        
    }
    public function store(Request $request){
        request()->validate([

            'password' => 'required| min:8',
            'nom'=>'required|min:2|max:255',
            'prenom'=>'required|min:2|max:255',
            'adresse'=>'required',
            'tel'=>'required|min:8|numeric',
           
            ]);

        $user= new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->adresse=$request->adresse;
        $user->tel=$request->tel;
        
        $user->role=$request->role;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('/dashboard')->with("success", "Vous étes inscrit maintenant !");

    }
    public function auth(Request $request){
        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password ])){
            //$admin=User::all();
            return view('dashboard.dash-admin');
    }
}
}
