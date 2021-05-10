@extends('layouts.head')
@extends('layouts.dashboard')


@csrf
<div class="container mt-5 d-flex justify-content-center">
    <div class="cards p-3">
        <div class="d-flex align-items-center">
            <div class="image"> <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155"> </div>
            <div class="ml-3 w-100">
                
                <h4 class="mb-0 mt-0">{{$pro2->name}}</h4> <span>{{$pro2->bio}}</span>
                
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="articles">Post</span> <span class="number1">{{$profiles}}</span> </div>
                    <div class="d-flex flex-column"> <span class="followers">Like</span> <span class="number2">{{$count}}</span> </div>
                    <div class="d-flex flex-column"> <span class="rating"></span> <span class="number3"></span> </div>
                </div>
                <div class="buttons mt-2 d-flex flex-row align-items-center"> 
                    <button class="btn btn-sm btn-outline-primary w-100">Chat</button> 
                    <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> 
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($profile as $postakun)
    <div class="post1">
        <img src="mini1.png" alt="profile is here"
            height="40" width="40" /><br>
        <img src="{{$postakun->post}}" alt="doc is here"
            height="400" width="565" /><br><br>


            <p3>{{$postakun->desc}}</p3><br><br>
        <p6>
            <form action ="/like2/{{$postakun->id}}" method='POST'>
            @csrf
            @method('PUT')
                <button type="submit" class="btn btn-primary btn-sm">Like</button>
            </form>
        </p6>
        
        
        <hr>
        <p1>{{$postakun->like}}</p1>
        <p2> Like this</p2>
        <p1> </p1>
        <p2> </p2>

        <div class="nama">
            <div id="post2text" class="post1">
                <p3><a href="/profilepost/{{$postakun->id_user}}">{{$postakun->userkepost->name}}</a></p3>
                <p2> </p2>
                <p1> </p1>
                <p2> </p2>
                <p1> </p1><br>
                <p4>{{$postakun->created_at}}</p4>
            </div>
        </div>

        <div id="commentboxpos2" class="post1">
            <input type="text" placeholder="comment"
                id="commentbox" />
        </div>
    </div>
    <br><br><br>
    @endforeach
    <br><br><br><br><br>