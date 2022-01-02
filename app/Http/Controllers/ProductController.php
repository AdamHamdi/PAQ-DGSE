<?php

namespace App\Http\Controllers;
use App\Product;
use App\Action;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    
    //index produit
    public function index(){
        $prod=Product::all();
        $action=Action::where('user_id', '=' ,auth()->user()->id)->get();
        return view('produits.produits',['prod'=>$prod, 'act'=>$action]);
    }
    // store produit
    public function store(Request $request){
            $prod= new Product();
            $prod->quantite=$request->quantite;
            $prod->prix=$request->prix;
            $prod->date_debut=$request->date_debut;
            $prod->date_fin=$request->date_fin;
            $prod->action_id=$request->action_id;
          
                 
            $prod->save();
            return redirect()->route('produits')->with('success',"Le produit a été ajouté avec succès");
        
    }
    // editproduit
    public function edit($id){
        $prod=Product::find($id);
        $action=Action::where('user_id', '=' ,auth()->user()->id)->get();
        return view('produits.modifier-produit',['prod'=>$prod, 'act'=>$action]);
    }
    // update produit
    public function update(Request $request, $id){
        $prod= Product::find($id);
        $prod->quantite=$request->quantite;
        $prod->prix=$request->prix;
        $prod->date_debut=$request->date_debut;
        $prod->date_fin=$request->date_fin;
        $prod->action_id=$request->action_id;
      
             
        $prod->save();
        return redirect()->route('produits')->with('success',"Le produit a été ajouté avec succès");
    
}
   
    // supprimer produit
    public function delete($id){
        $ac=Product::findorFail($id);
        $ac->delete();//
      
       return redirect()->back()->with('danger',"Le produit a été supprimée avec succès");

    }
    
}


