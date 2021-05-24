<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Post2;
use App\Models\User;
use App\Models\Following;
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
        $profilefirst = Post::where('id_user', $id)->first();
        $profiles = Post::where('id_user', $id )->count();
        $count = Post::where('id_user', $id)->sum('like');

        $profile2 = Post2::where('id_user', $id)->get();
        $profilefirst2 = Post2::where('id_user', $id)->first();
        $profiles2 = Post2::where('id_user', $id )->count();
        $count2 = Post2::where('id_user', $id)->sum('like');

        //dd($pro2);
        return view('Profile', compact('profiles', 'profile', 'pro', 'pro2', 'count', 'profilefirst'
                                        ,'profile2', 'profilefirst2', 'profiles2', 'count2'));
    }

    //delete post in profile person
    public function deleteprofilepost($id){
        $post = Post::where('id', $id)->first();
        
        $post->delete();

        return redirect('/profile/{id}');
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


        $profile2 = Post2::where('id_user', $id)->get();
        $profilefirst2 = Post2::where('id_user', $id)->first();
        $profiles2 = Post2::where('id_user', $id )->count();
        $count2 = Post2::where('id_user', $id)->sum('like');

        //dd($pro2);
        return view('ProfilePost', compact('profile', 'profiles', 'pro2', 'count'
                                            , 'profile2', 'profilefirst2', 'profiles2', 'count2'));
    }

    public function editprofile(Request $request, $id){
        $editprofile = User::where('id', $id)->first();
        $name = '';

        //dd($editprofile);

        //photo profile
        if($request->hasFile('profile')){
            $image = $request->file('profile');
            $name = 'profile_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/profile');
            $image->move($destinationPath, $name);
           
        }
       

        $editprofile->update([
            'name' => $request->nameprofile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'profile' => 'img/profile/'.$name
            
        ]);

        
        return response('success');
    }




    //like for home
    public function like($id){
        $like2 = Post::where('id', $id)->first();
        $like = Post::where('id', $id)->first();
        
        $like->update([
            'like' => $like->like + 1
        ]);
        
        //dd($like);
        return redirect('/group1');
        //return redirect()->action([MainController::class, 'profilepost'], ['id' => $like2->id]);
    }

    //like for profilepost
    public function likeprofilepost($id){
        $like2 = Post::where('id', $id)->first();
        $like = Post::where('id', $id)->first();
        
        $like->update([
            'like' => $like->like + 1
        ]);
        
        //dd($like);
        //return redirect('/group1');
        return redirect()->action([MainController::class, 'profilepost'], ['id' => $like2->id]);
    }



    //comment page
    public function commentpage($id){
        
        $post = Post::where('id', $id)->get();

        $post2 = Post::where('id', $id)->get();

        $comment = Comment::find($id);

        $comment2 = Comment::where('id_post', $id)->where('group', 1)->get();

        //dd($comment2);
        return view('Comment', compact('comment2', 'post', 'comment'));
        
    }

    //comment
    public function comment(Request $request, $id){ 
        
        $comment2 = Post2::where('id', $id)->first();

        $comment = Comment::create([
            'id_user' => Auth::id(),
            'id_post' => $id,
            'comment' => $request->comment,
            'group' => 1
        ]);

        //return redirect('/group1');
        return redirect()->action([MainController::class, 'commentpage'], ['id' => $comment2->id]);
    }

    //commentcomment
    public function commentcomment(Request $request, $id){ 
        $commentcomment = Post::where('id', $id)->first();

        $comment = Comment::create([
            'id_user' => Auth::id(),
            'id_post' => $id,
            'comment' => $request->comment
        ]);

        //return redirect('/comment/{id}');
        return redirect()->action([MainController::class, 'commentpage'], ['id' => $commentcomment->id]);
    }


    //comment page 2
    public function commentpage2($id){
        
        $post = Post2::where('id', $id)->get();

        $comment = Comment::find($id);

        $comment2 = Comment::where('id_post', $id)->where('group', 2)->get();

        //dd($post);
        return view('Comment', compact('comment2', 'post'));
        
    }

    //comment page 2
    public function comment2(Request $request, $id){ 
        $comment2 = Post2::where('id', $id)->first();

        $comment = Comment::create([
            'id_user' => Auth::id(),
            'id_post' => $id,
            'comment' => $request->comment,
            'group' => 2
        ]);

        //return redirect('/group2');
        return redirect()->action([MainController::class, 'commentpage2'], ['id' => $comment2->id]);
    }

    //commentcomment page2
    public function commentcomment2(Request $request, $id){ 
        $commentcomment2 = Post2::where('id', $id)->first();

        $comment = Comment::create([
            'id_user' => Auth::id(),
            'id_post' => $id,
            'comment' => $request->comment
        ]);

        //return redirect('/comment/{id}');
        return redirect()->action([MainController::class, 'commentpage2'], ['id' => $commentcomment2->id]);
    }


    //like for profile person
    public function like2($id){
        $like2 = Post2::where('id', $id)->first();
        $like = Post2::where('id', $id)->first();
            
        $like->update([
            'like' => $like->like + 1
        ]);
            
        //dd($like);
        return redirect('/group2');
        //return redirect()->action([MainController::class, 'profilepost'], ['id' => $like2->id]);
    }

    //following
    public function followingpage($id){
        $following = Following::where('id_user', $id)->get();
        $numberfollowing = Following::where('id_user', $id )->count();


        //return view('Following', compact('following'));

        //dd($numberfollowing);
        return view('Following', compact('following', 'numberfollowing'));
    }

    //follow button
    public function follow(Request $request, $id){
        $profileperson = User::where('id', $id)->first();

        $follow = Following::create([
            'id_user' => Auth::id(),
            'follow' => $profileperson->id
        ]);
        
        //echo('success');
        //return redirect('/home');
        return redirect()->action([MainController::class, 'profilepost'], ['id' => $profileperson->id]);
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
        return redirect('/group1');

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


