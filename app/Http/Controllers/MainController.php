<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use App\Models\User;
use Auth;

class MainController extends Controller
{
    //homepage
    public function homepage(){
        return view('/home');
    }

    //get post in home
    public function getpost(){
        $post= Post::all();
    
        return view('/home', compact('post'));

    }
    //post page
    public function createpostpage(){
        return view ('CreatePost');
    }

    //upload post page
    public function uploadpost(Request $request){
        $name = '';

        if($request->hasFile('post')){
            $image = $request->file('post');
            $name = 'test_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/test');
            $image->move($destinationPath, $name);
           
        }
        $uploadpost = Post::create([
            'id_user' =>Auth::id(),
            'post' => '/img/test/'.$name,
            'desc'=> $request->desc
        ]);



        //dd($uploadpost);
        return redirect('/home');

    }

    //profile page
    public function profilepage($id){
        $pro = User::all();
        $pro2 = User::where('id', $id)->first();
        $profile = Post::where('id_user', $id)->get();
        $profiles = Post::where('id_user', $id )->count();

        //dd($profiles);
        return view('Profile', compact('profiles', 'profile', 'pro', 'pro2'));
    }


    //profile post
    public function profilepost($id){

        //get all data
        $profile = Post::where('id_user', $id)->get();

        //get ammount post
        $profiles = Post::where('id_user', $id )->count();

        //get profile
        $pro2 = User::where('id', $id)->first();

        //dd($pro2);
        return view('ProfilePost', compact('profile', 'profiles', 'pro2'));
    }

    public function editprofile(Request $request, $id){
        $editprofile = Profile::where('id', $id)->first();

        $editprofile->update([
            'name' => $request->name,
            'email' => $request->name,
            'password' => $request->name,
            'bio' => $request->name,
        ]);

        return redirect('/editprofile');
    }




    //like
    public function like(Request $request, $id){
        $like = Post::where('id', $id)->first();

        $like->update([
            'like' =>$request->like
        ]);

        return redirect('/home');
    }


}


