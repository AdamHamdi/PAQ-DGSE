<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    //
    public function profil(){
        return view('admin.profile.profile');
    }
    public function update(Request $request, $id){
        $user=User::findOrFail($id);
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
        return redirect()->route('profil')->with('success',"Votre profil a été modifiée avec succès");
    }
    
}
