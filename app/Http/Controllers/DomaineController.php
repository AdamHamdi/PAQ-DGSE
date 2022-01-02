<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domaine;
use Illuminate\Support\Facades\Auth;
class DomaineController extends Controller
{
     //
    
    //index domaine
    public function index(){
        $dom=Domaine::all();
        
        return view('domaines.domaine',['dom'=>$dom, ]);
    }
    // store domaine
    public function store(Request $request){
            $dom= new Domaine();
            $dom->nom_domaine=$request->nom_domaine;
            $dom->budget_domaine=$request->budget_domaine;
            $dom->user_id=auth()->user()->id;
          
            $dom->save();
            return redirect()->route('domaines')->with('success',"Le domaine a été ajouté avec succès");
        
    }
    // edit domaine
    public function edit($id){
        $dom=Domaine::find($id);
        return view('domaines.modifier-domaine',['dom'=>$dom]);
    }
    // update domaine
    public function update(Request $request, $id){
        $prod= Domaine::find($id);
        $prod->nom_domaine=$request->nom_domaine;
        $prod->budget_domaine=$request->budget_domaine;
        $prod->user_id=auth()->user()->id;
        
        $prod->save();
        return redirect()->route('domaines')->with('success',"Le domaine a été ajouté avec succès");
    
}
   
    // supprimer domaine
    public function delete($id){
        $ac=Domaine::findorFail($id);
        $ac->delete();//
      
       return redirect()->back()->with('danger',"Le domaine a été supprimée avec succès");

    }
}
