<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

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



    //like
    public function like($id){
        $like = Post::where('id', $id)->first();
        
        $like->update([
            'like' => $like->like + 1
        ]);
        
        //dd($like);
        return redirect('/home');
    }


}


