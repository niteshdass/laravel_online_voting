<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Date;
use Image;
use App\Admin;
use App\Election;
use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{

    public function AdminPath(){
        $admin_name=Session::get('name');

        if($admin_name){
            return ;
        }else{
            return Redirect::to('/back_login')->send();
        }
    }

    public function back_login(){
        return view('backend.back_login');
    }
    //login_admin

    public function login_admin(Request $req){
        $name=$req->gmail;
    	$pass=$req->password;
    	
    	$result=DB::table('admins')
    		->where('gmail',$name)
    		->where('password',$pass)
    		->first();
   		if($result){
   			session::put('name',$result->gmail);
    		session::put('id',$result->id);
   			return Redirect::to('/back_home');

   		}else{
   			session::put('messege','Email or Password is Invalid');
    		return Redirect::to('/back_login');
   		}
    }


    public function back_home(){
        $this->AdminPath();
        return view('backend.back_home');
    }

   




    //back_add_election----------------------------------------------------------------

    public function back_add_election(){
        $this->AdminPath();
        return view('backend.back_add_election');
    }

    //save_election---------------------------------------------------------------------------------

    public function save_election(Request $request){
        $this->AdminPath();

        $request->validate([

		    'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'start' => 'required',
            'end' => 'required',
		]);

    	$products=new Election;

    	$products->title=$request->title;
        $products->desc=$request->desc;
        $products->start=$request->start;
        $products->end=$request->end;
    	if($request->hasFile('image')){
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();

            $path=public_path($img);

            Image::make($image)->save($path);

            $products->image=$img;
            $products->save();
             session::put('messege','Registration has been success');
    	return redirect()->route('back_add_election');
        }

    	return redirect()->route('back_add_election');

    
    }


    //back_view_election------------------------------------------------------------------------------

    public function back_view_election(){

        $data=DB::table('elections')->get();
        $this->AdminPath();
        return view('backend.back_view_election')->with('data',$data);
    }

    //active_election------------------------------------------------------------------
    public function active_election($id){
        $this->AdminPath();
        DB::table('elections')->where('id',$id)->update(['vote_status'=>0]);
        
        return Redirect::to('/back_view_election');
    }
    //unactive_election--------------------------------------------
    public function unactive_election($id){
        $this->AdminPath();
        DB::table('elections')->where('id',$id)->update(['vote_status'=>1]);
        
        return Redirect::to('/back_view_election');
    }

    //delete_election----------------------------------------------------------------
    public function delete_election($id){
        $this->AdminPath();
       $donar=DB::table('elections')->where('id',$id)->delete();
       return Redirect::to('/back_view_election');
     }

     ///unactive_candidate----------------------------------------------------------------------------
     
     public function back_add_candidate(){
        $this->AdminPath();
        return view('backend.back_add_candidate');
    }

    public function back_view_candidate($id){
        $this->AdminPath();

        $candidate=DB::table('candidates')->join('elections','candidates.e_id','=','elections.id')->select('candidates.*','elections.title')->where('e_id',$id)->get();
        return view('backend.back_view_candidate')->with('candidate',$candidate);
    }


    
     public function unactive_candidate($id){
        $this->AdminPath();
        DB::table('candidates')->where('id',$id)->update(['allow_status'=>0]);
        
        return Redirect::to('/back_home');
    }

    public function active_candidate($id){
        $this->AdminPath();
        DB::table('candidates')->where('id',$id)->update(['allow_status'=>1]);
        
        return Redirect::to('/back_home');
    }
    public function delete_candidate($id){
        $this->AdminPath();
       $donar=DB::table('candidates')->where('id',$id)->delete();
       return Redirect::to('/back_home');
     }


     //===============================back_view_voters=============================

     public function back_view_voters($id){
        $this->AdminPath();
       $donar=DB::table('voters')->join('elections','voters.e_id','=','elections.id')->select('voters.*','elections.title')->where('e_id',$id)->paginate(2);
       return view('backend.back_view_voters')->with('donar',$donar);
     }


     
     public function unactive_voters($id){
        $this->AdminPath();
        DB::table('voters')->where('id',$id)->update(['allow_status'=>0]);
        
        return Redirect::to('/back_home');
    }

    public function active_voters($id){
        $this->AdminPath();
        DB::table('voters')->where('id',$id)->update(['allow_status'=>1]);
        
        return Redirect::to('/back_home');
    }
    public function delete_voters($id){
        $this->AdminPath();
       $donar=DB::table('voters')->where('id',$id)->delete();
       return Redirect::to('/back_home');
     }
//===========================vote_count=====================================
 public function vote_count($id){
        $this->AdminPath();
       $donar=DB::table('votes')->where('e_id',$id)->paginate(100);
       return view('backend.vote_count')->with('donar',$donar);
     }

     public function delete_vote($id){
        $this->AdminPath();
       $donar=DB::table('votes')->where('id',$id)->delete();
   			return Redirect::to('/back_home');
    
     }



     ////////back_result   unpublication_candidate publication_candidate
     public function back_result($id){
        $this->AdminPath();
        $donar=DB::table('candidates')->where('e_id',$id)->get();
        
        return view('backend.back_view_results')->with('donar',$donar);
    }  

    public function unpublication_candidate($id){
        $this->AdminPath();
       $sss=DB::table('candidates')->where('id',$id)->update(['publication_status'=>0]);
     
        return Redirect::to('/back_home');
    
    }


    public function publication_candidate($id){
        $this->AdminPath();
       $sss=DB::table('candidates')->where('id',$id)->update(['publication_status'=>1]);
     
        return Redirect::to('/back_home');
    
    }



    public function champ_candidate($id){
        $this->AdminPath();
       $sss=DB::table('candidates')->where('id',$id)->update(['champ_status'=>0]);
     
        return Redirect::to('/back_home');
    
    }


    public function looser_candidate($id){
        $this->AdminPath();
       $sss=DB::table('candidates')->where('id',$id)->update(['champ_status'=>1]);
     
        return Redirect::to('/back_home');
    
    }



}
