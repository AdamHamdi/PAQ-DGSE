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
    public function ResActionStore(Request $request){
        request()->validate([

            'password' => 'required| min:8',
            'nom'=>'required|min:2|max:255',
            'prenom'=>'required|min:2|max:255',
            'adresse'=>'required',
            'tel'=>'required|min:8|numeric',
            'photo'=>'required'
            ]);
           
            
          
            $user= new User();
            if($request->hasFile('photo')){
                $file=$request->file('photo');
                $name=$file->getClientOriginalName();
                $file->move(public_path().'images/photos/', $name);
                $user->photo=$name;}
            
            $user->nom=$request->nom;
            $user->prenom=$request->prenom;
            $user->adresse=$request->adresse;
            $user->tel=$request->tel;
            $user->role=$request->role;
            $user->email=$request->email;
            $user->password=bcrypt($request->password); 
            // dd($user) ;          
            $user->save();
            $resaction=new ResAction();
            $resaction->user_id=$user->id;
            $resaction->save();
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {}
            return redirect('/dashboard')->with("success", "Vous étes inscrit maintenant !");
    }
    public function auth(Request $request){
        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password ])){
            //$admin=User::all();
            return view('dashboard.dash-admin');
    }
}
    public function ResDomaineStore(Request $request){
        request()->validate([

            'password' => 'required| min:8',
            'nom'=>'required|min:2|max:255',
            'prenom'=>'required|min:2|max:255',
            'adresse'=>'required',
            'tel'=>'required|min:8|numeric',
            'photo'=>'required'
            ]);
           
           
          
            $user= new User();
            if($request->hasFile('photo')){
                $file=$request->file('photo');
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/images/photos/', $name);
                $user->photo=$name;
                }
            
           
            $user->nom=$request->nom;
            $user->prenom=$request->prenom;
            $user->adresse=$request->adresse;
            $user->tel=$request->tel;
            $user->role=$request->role;
            $user->email=$request->email;
            $user->password=bcrypt($request->password); 
            // dd($user) ;          
            $user->save();
            $resaction=new Resdomaine();
            $resaction->user_id=$user->id;
            $resaction->save();
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {}
            return redirect('/dashboard')->with("success", "Vous étes inscrit maintenant !");
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    
     }

}
