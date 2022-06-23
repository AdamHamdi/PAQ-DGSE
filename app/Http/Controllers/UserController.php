<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\ResAction;
use App\Domaine;
use App\ResDomaine;
use App\Action;
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
            'nom'=>'required|min:2|max:255| regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'prenom'=>'required|min:2|max:255| regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'adresse'=>'required | regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'tel'=>'required|min:8|numeric',
            'photo'=>'required'
            ]);
           
            
          
            $user= new User();
            if($request->hasFile('photo')){
                $file=$request->file('photo');
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/images/photos/', $name);
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
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) { 
                 
                
                $action= DB::table('actions')->select('users.id', 'actions.status','actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
                ->join('users', 'users.id', '=', 'actions.user_id') 
                ->join('domaines', 'domaines.id', '=', 'actions.domaine_id')
                ->where('users.id', auth()->user()->id)  
                ->get();
            
                 return view('dashboard.dash-res-action',['action'=>$action])->with("success", "Vous étes inscrit maintenant !");
    }}
    public function auth(Request $request){
        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password ])){
            if (Auth::check() && Auth::user()->role==='responsable domaine') {
                $do = DB::table('resdomaines')->select('domaines.nom_domaine','domaines.budget_domaine')
    ->join('domaines', 'domaines.id', '=','resdomaines.domaine_id')  
    ->join('users', 'users.id', '=','resdomaines.user_id') 
    ->where('resdomaines.user_id', '=' ,auth()->user()->id) 
    ->get();
    $action= DB::table('actions')->select('users.id' ,'actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
    ->join('users', 'users.id', '=', 'actions.user_id') 
    ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
    ->where('users.id', '=' ,auth()->user()->id) 
    ->get();
    $act=Action::where('status','en cours')->where('user_id', auth()->user()->id)->count();
    $act_ter=Action::where('status','terminee')->where('user_id', auth()->user()->id)->count();
    return view('dashboard.dash-res-domaine',['domaine'=>$do,'action'=>$action,'act'=>$act,'act_ter'=>$act_ter ]);
            }
            if (Auth::check() && Auth::user()->role==='responsable action') {
                $do = DB::table('resdomaines')->select('domaines.nom_domaine','domaines.budget_domaine','domaines.id')
                ->join('domaines', 'domaines.id', '=','resdomaines.domaine_id')  
                ->get();
               
                $action= DB::table('actions')->select('users.id', 'actions.status','actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
                ->join('users', 'users.id', '=', 'actions.user_id') 
                ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
                ->where('users.id', auth()->user()->id) 
                ->get();
                return view('dashboard.dash-res-action',['domaine'=>$do,'action'=>$action]) ;
            }
            if (Auth::check() && Auth::user()->role==='admin') {
                $do= Domaine::all() ;
                $users = DB::table('resdomaines')->select( ) 
                ->join('users', 'users.id', '=', 'resdomaines.user_id') 
                ->where('resdomaines.user_id', '=' ,auth()->user()->id) 
                ->get();
                $action= DB::table('actions')->select('users.id', 'actions.status','actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
                ->join('users', 'users.id', '=', 'actions.user_id') 
                ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
                ->get();
                return view('dashboard.dash-admin',['domaine'=>$do,'action'=>$action]) ;      
            }
             
  
             
    }
}
public function action(){
    $action=Action::with('user','domaine')->get();
    return $action;
}
public function dashboard_admin(){
    $do=Domaine::with('actions')->get();
    $action= DB::table('actions')->select('users.id', 'actions.status','actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
    ->join('users', 'users.id', '=', 'actions.user_id') 
    ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
    ->get(); $act=Action::where('status','en cours')->count();
    $act_ter=Action::where('status','terminee')->count();
    return view('dashboard.dash-res-domaine',['domaine'=>$do,'action'=>$action,'act'=>$act,'act_ter'=>$act_ter ]);
  
}
public function dashboard_responsable_domaine(){
    $do = DB::table('resdomaines')->select('domaines.nom_domaine','domaines.budget_domaine')
    ->join('domaines', 'domaines.id', '=','resdomaines.domaine_id')  
    ->join('users', 'users.id', '=','resdomaines.user_id') 
    ->where('resdomaines.user_id', '=' ,auth()->user()->id) 
    ->get();
    $action= DB::table('actions')->select('users.id' ,'actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
    ->join('users', 'users.id', '=', 'actions.user_id') 
    ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
    ->where('users.id', '=' ,auth()->user()->id) 
    ->get();
    $act=Action::where('status','en cours')->where('user_id', auth()->user()->id)->count();
    $act_ter=Action::where('status','terminee')->where('user_id', auth()->user()->id)->count();
    return view('dashboard.dash-res-domaine',['domaine'=>$do,'action'=>$action,'act'=>$act,'act_ter'=>$act_ter ]);

}
public function dashboard_responsable_action(){
    $do=Domaine::with('actions')->get();
  
    $action= DB::table('actions')->select('users.id', 'actions.status','actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
    ->join('users', 'users.id', '=', 'actions.user_id') 
    ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
    ->where('users.id', '=' ,auth()->user()->id) 
    ->get();
    return view('dashboard.dash-res-action',['domaine'=>$do,'action'=>$action ]);
  
}
    public function ResDomaineStore(Request $request){
        request()->validate([

            'password' => 'required| min:8',
            'nom'=>'required|min:2|max:255| regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'prenom'=>'required|min:2|max:255| regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'adresse'=>'required | regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'tel'=>'required|min:8|numeric',
            'photo'=>'required',
            'email.required' => 'We need to know your e-mail address!',
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
            $resaction->domaine_id=$request->domaine_id;
           
            $resaction->save();
           
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) { 
                $do = DB::table('resdomaines')->select('domaines.nom_domaine','domaines.budget_domaine')
                ->join('domaines', 'domaines.id', '=','resdomaines.domaine_id') 
                ->join('users', 'users.id', '=','resdomaines.user_id') 
                ->where('resdomaines.user_id', '=' ,auth()->user()->id) 
                ->get();
                $action= DB::table('actions')->select('users.id' ,'actions.nom_act','actions.budget','actions.status','actions.date_debut','actions.date_fin','users.nom','users.prenom','domaines.nom_domaine')  
                ->join('users', 'users.id', '=', 'actions.user_id') 
                ->join('domaines', 'domaines.id', '=', 'actions.domaine_id') 
                ->where('users.id', '=' ,auth()->user()->id) 
                ->get();
                $act=Action::where('status','en cours')->where('user_id', auth()->user()->id)->count();
                $act_ter=Action::where('status','terminee')->where('user_id', auth()->user()->id)->count();
                return view('dashboard.dash-res-domaine',['domaine'=>$do,'action'=>$action,'act'=>$act,'act_ter'=>$act_ter ])
           ->with("success", "Vous étes inscrit maintenant !");
         
    }}
    public function logout(){
        Auth::logout();
        return redirect('/login');
    
     }

}