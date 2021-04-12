@extends('layouts.head')

@extends('layouts.dashboard')

<html>

<body>

<div class="button">
    <a href="/createpostpage">
        <button type="button" class="btn btn-success btn-group-lg">Create Post</button>
    </a>
</div>

@foreach ($post as $postakun)
    <div class="post1">
        <img src="mini1.png" alt="profile is here"
            height="40" width="40" /><br>
        <img src="{{$postakun->post}}" alt="doc is here"
            height="400" width="565" /><br><br>
        <p6>
            <a href="/like/{$post->id}">Like</a>
        </p6>
        
        <br>
        <hr>
        <p1>5</p1>
        <p2> and</p2>
        <p1> 5 others</p1>
        <p2> like this</p2>
        <div id="post2text" class="post1">
            <p3><a href="/profilepost/{{$postakun->id_user}}">{{$postakun->userkepost->name}}</a></p3>
            <p2> </p2>
            <p1> </p1>
            <p2> </p2>
            <p1> </p1><br>
            <p4>{{$postakun->created_at}}</p4>
        </div>

        <div id="commentboxpos2" class="post1">
            <input type="text" placeholder="comment"
                id="commentbox" />
        </div>
    </div>
    @endforeach
    
</body>

