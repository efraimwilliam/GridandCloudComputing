@extends('layouts.head')
@extends('layouts.dashboard')



<div class="container mt-5 d-flex justify-content-center">
    <div class="cards p-3">
        <div class="d-flex align-items-center">
            <div class="image"> <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155"> </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0">{{Auth::user()->name}}</h4> <span>{{$pro2->bio}}</span>
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="articles">Post</span> <span class="number1">{{$profiles}}</span> </div>
                    <div class="d-flex flex-column"> <span class="followers">Like</span> <span class="number2">980</span> </div>
                    <div class="d-flex flex-column"> <span class="rating"></span> <span class="number3"></span> </div>
                </div>
                <div class="buttons mt-2 d-flex flex-row align-items-center"> 
                    
                    <button class="btn btn-sm btn-outline-primary w-100" id="btn-add">Edit Profile</button>
                    <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> 
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="linkEditorModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="linkEditorModalLabel">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter your name" value="{{Auth::user()->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter your Email" value="{{$pro2->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter your Password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bio</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bio" name="bio"
                                       placeholder="Enter your Bio" value="{{$pro2->bio}}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                    </button>
                    <input type="hidden" id="name_id" name="name_id" value="{{$pro2->id}}">
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@foreach ($profile as $postakun)
    <div class="post1">
        <img src="" alt="profile is here"
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
            <p3>{{$postakun->userkepost->name}}</p3>
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
    

  