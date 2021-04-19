@extends('layouts.head')
@extends('layouts.dashboard')

<div class="button">
    <a href="/createpostpage2">
        <button type="button" class="btn btn-success btn-group-lg">Create Post</button>
    </a>
</div>

@foreach ($post as $postakun)
    <div class="post1">
        <img src="mini1.png" alt="profile is here"
            height="40" width="40" /><br>
        <img src="{{$postakun->post}}" alt="doc is here"
            height="400" width="565" /><br><br>


            <p3>{{$postakun->desc}}</p3><br><br>
        <p6>
            <form action ="/like/{{$postakun->id}}" method='POST'>
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
    <br><br><br>
    @endforeach
    <br><br><br><br><br>
    
</body>