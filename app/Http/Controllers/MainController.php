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
        //$post2 = DB::table('post')->select('id', 'id_user', 'post', 'desc', 'like', 'created_at')->get();

        $post= Post::all();
        //$post2 = Post::find($id);
        //return $post;
        //dd($post);
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

    public function profilepage(){
        //$profile = Post::get();

        //$pro = Post::find();

        //$jumlah = Post::count();
        //return view('Profile', compact('profile'));
        
        //$profiles = Post::where('id')->count();

        //$platinum = User::where('stripe_plan', 'platinum_monthly')->count();
        //$profiles = Post::count();

        //$count = Model::where('status','=','1')->count();

        $profiles = Post::where('id_user', '$id' )->count();
        //dd($profiles);
        return view('Profile', compact('profiles'));
    }

}


