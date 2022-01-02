<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\Domaine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ActionController extends Controller
{
    //
    public function index(){
        $action=Action::paginate(9);
        $domaine=Domaine::all();
        return view('admin.action.action-liste',['a'=>$action,'d'=>$domaine]);
    }
    /**** new action store */
    public function store(Request $request){
      
            $action=new Action();
            $action->nom_act=$request->nom_act;
            $action->domaine_id=$request->domaine_id; 
            $action->user_id = auth()->user()->id;
            $action->date_debut=$request->date_debut;
            $action->date_fin=$request->date_fin;
            $action->budget=$request->budget;
            $action->save();
     
            return redirect()->back()->with('success',"L'action a été ajoutée avec succès");
        
    }
            /***edit */
            public function edit($id){
                $acti=Action::findOrFail($id);
                $dom = DB::table('actions')->select()
                ->join('domaines','domaines.id','=','actions.domaine_id')
                ->where('actions.id',$id)
                ->get();
               
             return view('admin.action.modifier-action',['acti'=> $acti,'d'=>$dom]);
            }
        /*** update */
        public function update(Request $request, $id){
        
            $action=Action::findOrFail($id);
            $action->nom_act=$request->nom_act;
            $action->domaine_id=$request->domaine_id; 
            $action->user_id = auth()->user()->id;
            $action->date_debut=$request->date_debut;
            $action->date_fin=$request->date_fin;
            $action->budget=$request->budget;
            $action->save();
    
            return redirect()->route('actions')->with('success',"L'action a été modifiée avec succès");
        
        }
        /***delete */
        public function delete($id){
            $ac=Action::findorFail($id);
            $ac->delete();//
          
           return redirect()->back()->with('danger',"L'action a été supprimée avec succès");
   
        }
    /****detail */
    
    public function detail($id){
        $acti=Action::findOrFail($id);
        // dd($acti);
        return view('admin.action.action-liste',['action'=> $acti]);
    }
    }