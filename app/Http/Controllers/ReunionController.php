<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reunion;
use Illuminate\Support\Facades\Validator;
class ReunionController extends Controller
{ public function index(){
    $Reunion=Reunion::orderBy('date', 'ASC')->paginate(9);
    // dd($rendez_vous);
    return view('admin.reunion',['r'=> $Reunion]);
 
}

//creer un rendez-vous
public function Store(Request $request)
{
   //
  
    $reun=new Reunion();
    $reun->status=$request->status;
    $reun->user_id = auth()->user()->id;
    $reun->date=$request->date;
     
   
    $reun->save();

    return redirect()->back()->with('success','La reunion a été ajoutée avec succès');
}
//edit rendez-vous
public function edit($id){
    $reunion=Reunion::findOrFail($id);
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
     $reunion=Reunion::fiunionOrFail($id);
     $reunion->status=$request->status;
     $reunion->user_id = auth()->user()->id;
     $reunion->date=$request->date;
    
     $reunion->save();

     return redirect()->back()->with('info','La reunion a été modifié avec succès');
 }

public function delete($id)
{
    $re=Reunion::findorFail($id);
     $re->delete();//
   
    return redirect()->back()->with('danger','La reunion a été supprimé avec succès');

}

}