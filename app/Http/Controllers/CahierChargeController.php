<?php

namespace App\Http\Controllers;
use App\Cahier_charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CahierChargeController extends Controller
{
    //index cahier de charge
    public function index(){
        $cahier=Cahier_charge::all();
        return view('CahierCharge.cahier-charge',['cahier'=>$cahier]);
    }
    // store cahier de charge
    public function store(Request $request){
            $cahier= new Cahier_charge();
            if($request->hasFile('fichier')){
                $file=$request->file('fichier');
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/cahier_charges/fichiers/', $name);
                $cahier->fichier=$name;}
            
            $cahier->nom=$request->nom;
            $cahier->user_id=auth()->user()->id;
                 
            $cahier->save();
            return redirect()->route('cahier-charge')->with('success',"Le cahier de charge a été ajouté avec succès");
        
    }
    // editcahier de charge
    public function edit($id){
        $ac=Cahier_charge::find($id);
        // dd($ac); 
        return view('CahierCharge.edit-cahier-charge',['cah'=>$ac]);
    }
    // update cahier de charge
    public function update(Request $request, $id){
        
        $cahier=Cahier_charge::find($id);
      
        if($request->hasFile('fichier')){
            $file=$request->file('fichier');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/cahier_charges/fichiers/', $name);
            $cahier->fichier=$name;}
            
        $cahier->nom=$request->nom;
        $cahier->user_id=auth()->user()->id;
           
        $cahier->save();
        return redirect()->route('cahier-charge')->with('success',"Le cahier de charge a été modifié avec succès");
    
    }
    // update cahier de charge
   
    public function delete($id){
        $ac=Cahier_charge::findorFail($id);
        $ac->delete();//
      
       return redirect()->back()->with('danger',"Le cahier de charge a été supprimée avec succès");

    }
    
}
