<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;
use App\Voter;
use Carbon\Carbon;
use Image;
use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use DB;

class HomeController extends Controller
{


    public function AdminPath(){
        $admin_name=Session::get('b_c_n');

        if($admin_name){
            return ;
        }else{
            return Redirect::to('/login')->send();
        }
    }










    public function index(){
     
        return view('home.index');
    }

    //save_user======================================================================
    public function register(){
        return view('home.register');
    }
    public function save_user(Request $request){
        $request->validate([

            'name' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'phone' => 'required',
            'gmail' => 'required|unique:voters|max:255',
            'Password' => 'required',
            'election' => 'required',
           
            'd_o_b' => 'required',
            'b_c_n' => 'required|unique:voters|max:255',
            'image' => 'required',
        ]);

        $date_b=$request->b_c_n;

        $user=DB::table('users')->where('b_c_n',$date_b)->first();
    
        if($user){
    
        $products=new Voter;
        $products->e_id=$request->election;
        $products->name=$request->name;
        $products->f_name=$request->f_name;
        $products->m_name=$request->m_name;
        $products->d_o_b=$request->d_o_b;
        $products->contact=$request->phone;
        $products->gmail=$request->gmail;
        $products->password=$request->Password;
        $products->b_c_n=$request->b_c_n;
        if($request->hasFile('image')){
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
    
            $path=public_path($img);
    
            Image::make($image)->save($path);
    
            $products->image=$img;
            $products->save();
             session::put('messege','Request has been submited. We will confirm via sms');
        return redirect()->route('register');
        }
    
        return redirect()->route('register');

    }
    session::put('messege','Date of birth Is Invalid...please Try To Valid');
    return redirect()->route('register');
    }




    public function login(){
        return view('home.login');
    }


    //////////take_vote========================================================================

    public function vote($id){

        $this->AdminPath();
        
        $voters=DB::table('voters')->where('id',$id)->get();
        

        return view('home.vote')->with('voter',$voters);
    }

    public function take_vote($id){

        $this->AdminPath();
        $voters=DB::table('candidates')->where('id',$id)->first();
        $user_id=Session::get('id');
        $can_id=$id;
        $position=$voters->position;
        $e_id=$voters->e_id;

        $data=array();
        $data['user_id']=$user_id;
    	$data['nomination_id']=$can_id;
        $data['position']=$position;
        $data['e_id']=$e_id;
        $data['vote_status']=1;

    	DB::table('votes')->insert($data);
        
        
        return redirect()->route('home');
    }












    public function result(){
        $this->AdminPath();
        return view('home.result');
    }


//get_nominate save_nomination candidate_details unactive_candidate===========
public function candidate_details($id){
    $this->AdminPath();
    $candidate=DB::table('candidates')->where('id',$id)->first();
    return view('home.candidate_details')->with('candidate',$candidate);
}


public function get_nominate(){

    return view('home.get_nominate');
}
public function contact(){

    return view('home.contact');
}

public function save_nomination(Request $request){

    $request->validate([

        'name' => 'required',
        'f_name' => 'required',
        'm_name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'education' => 'required',
        'election' => 'required',
        'position' => 'required',
        'about' => 'required',
        'd_o_b' => 'required',
        'b_c_n' => 'required|unique:candidates|max:255',
        'image' => 'required',
    ]);

    $date_b=$request->b_c_n;

    $user=DB::table('users')->where('b_c_n',$date_b)->first();

    if($user){

    $products=new Candidate;
    $products->e_id=$request->election;
    $products->position=$request->position;
    $products->name=$request->name;
    $products->f_name=$request->f_name;
    $products->m_name=$request->m_name;
    $products->d_o_b=$request->d_o_b;
    $products->contact=$request->phone;
    $products->address=$request->address;
    $products->aducation=$request->education;
    $products->about=$request->about;
    $products->b_c_n=$request->b_c_n;


    if($request->hasFile('image')){
        $image=$request->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();

        $path=public_path($img);

        Image::make($image)->save($path);

        $products->image=$img;
        $products->save();
         session::put('messege','Nomination Request has been success!!!you will contact you as soon');
    return redirect()->route('get_nominate');
    }

    return redirect()->route('get_nominate');

}
session::put('messege','This Is Not Correct Birth Certificate_num in Our APi');
return redirect()->route('get_nominate');

}

//save_login=============================================================================================================
public function save_login(Request $req){
    $name=$req->gmail;
    $pass=$req->password;
    
    $result=DB::table('voters')
        ->where('gmail',$name)
        ->where('password',$pass)
        ->first();
       if($result){
           session::put('gmail',$result->gmail);
           session::put('b_c_n',$result->b_c_n);
           session::put('e_id',$result->e_id);
           session::put('name',$result->name);
           session::put('id',$result->id);
           
           return Redirect::to('/home');

       }else{
           session::put('messege','Email or Password is Invalid');
        return Redirect::to('/login');
       }
}

public function logout(){
    Session::flush();
    return Redirect::to('/login');
 }
   

}
