<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rendez_vous;
class RendezVousController extends Controller
{
    public function index(){
        $rendez_vous=Rendez_vous::orderBy('date', 'ASC')->paginate(9);
        // dd($rendez_vous);
        return view('admin.rendez_vous',['r'=> $rendez_vous]);
     
    }

    //creer un rendez-vous
    public function Store(Request $request)
    {
       //
       $this->validate($request,[
        'date'=> 'required',
        

    ]);
        $rend=new Rendez_vous();
        $rend->status=$request->status;
        $rend->user_id = auth()->user()->id;
        $rend->date=$request->date;
       
        $rend->save();
 
        return redirect()->back()->with('success','Le rendez-vous a été ajouté avec succès');
    }
    //edit rendez-vous
    public function edit($id){
        $rendez_vous=Rendez_vous::findOrFail($id);
        //  dd($rendez_vous);
        //return view('admin.rendez_vous',['re'=> $rendez_vous]);
     
    }
     //update un rendez-vous
     public function update(Request $request, $id)
     {
        //
        $this->validate($request,[
         'date'=> 'required',
         
 
     ]);
         $rend=Rendez_vous::findOrFail($id);
         $rend->status=$request->status;
         $rend->user_id = auth()->user()->id;
         $rend->date=$request->date;
        
         $rend->save();
  
         return redirect()->back()->with('info','Le rendez-vous a été modifié avec succès');
     }

    public function delete($id)
    {
        $re=Rendez_vous::findorFail($id);
         $re->delete();//
       
        return redirect()->back()->with('danger','Le rendez-vous a été supprimé avec succès');

    }

}