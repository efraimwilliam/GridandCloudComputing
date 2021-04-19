<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use App\Models\Post2;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //homepage
    public function homepage(){
        return view('/home');
    }

    //newhome
    public function newhomepage(){
        return view('/home2');
    }

    //get post in home
    public function getpost(){
        $post= Post::all();
        $post2= Post::count();
    
        return view('/home', compact('post', 'post2'));

    }
    

    //profile page
    public function profilepage($id){
        $pro = User::all();
        $pro2 = User::where('id', $id)->first();
        $profile = Post::where('id_user', $id)->get();
        $profiles = Post::where('id_user', $id )->count();
        $count = Post::where('id_user', $id)->sum('like');

        //dd($count);
        return view('Profile', compact('profiles', 'profile', 'pro', 'pro2', 'count'));
    }


    //profile post
    public function profilepost($id){

        //get all data
        $profile = Post::where('id_user', $id)->get();

        //get ammount post
        $profiles = Post::where('id_user', $id )->count();

        //get profile
        $pro2 = User::where('id', $id)->first();

        //get amount like
        $count = Post::where('id_user', $id)->sum('like');

        //dd($pro2);
        return view('ProfilePost', compact('profile', 'profiles', 'pro2', 'count'));
    }

    public function editprofile(Request $request, $id){
        $editprofile = User::where('id', $id)->first();

        $editprofile->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio
        ]);

        //dd($editprofile);
        return redirect('/home');
    }



    //like for home
    public function like($id){
        $like = Post::where('id', $id)->first();
        
        $like->update([
            'like' => $like->like + 1
        ]);
        
        //dd($like);
        return redirect('/group1');
    }

    //like for profile person
    public function like2($id){
        $like = Post::where('id', $id)->first();
            
        $like->update([
            'like' => $like->like + 1
        ]);
            
        //dd($like);
        return redirect('/profile/{id}');
    }

    //get post group 1
    public function group1(){
        $post= Post::all();
        $post2= Post::count();
    
    return view('/group1', compact('post', 'post2'));
    }
    
    //post page
    public function createpostpage(){
        return view ('CreatePost');
    }

    //upload post page
    public function uploadpost(Request $request){
        $name = '';

        //photo
        if($request->hasFile('post')){
            $image = $request->file('post');
            $name = 'test_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/test');
            $image->move($destinationPath, $name);
           
        }

        $uploadpost = Post::create([
            'id_user' =>Auth::id(),
            'post' => '/img/test/'.$name,
            'desc'=> $request->desc,
            'like'=>0
        ]);

        //dd($uploadpost);
        return redirect('/home');

    }

    //get post group 2
    public function group2(){
        $post= Post2::all();
        $post2= Post2::count();
    
        //dd($post);
        return view('/group2', compact('post', 'post2'));
    }


    //post page
    public function createpostpage2(){
        return view ('CreatePost2');
    }


    //upload post page2
    public function uploadpost2(Request $request){
        $name = '';

        //photo
        if($request->hasFile('post2')){
            $image = $request->file('post2');
            $name = 'test_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/test');
            $image->move($destinationPath, $name);
           
        }

        $uploadpost = Post2::create([
            'id_user' =>Auth::id(),
            'post' => '/img/test/'.$name,
            'desc'=> $request->desc,
            'like'=>0
        ]);


        //dd($uploadpost);
        return redirect('/group2');

    }


    
}


