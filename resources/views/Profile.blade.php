@extends('layouts.head')
@extends('layouts.dashboard')



<div class="container mt-5 d-flex justify-content-center">
    <div class="cards p-3">
        <div class="d-flex align-items-center">
            <div class="image"> <img src="{{asset(Auth::user()->profile)}}" class="rounded" width="155"> </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0" id= "nama-namanya">{{Auth::user()->name}}</h4> <span>{{$pro2->bio}}</span>
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="articles">Post</span> <span class="number1">{{$profiles}}</span> </div>
                    <div class="d-flex flex-column"> <span class="followers">Like</span> <span class="number2">{{$count}}</span> </div>
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
                    <form id="form-update" name="modalFormData" class="form-horizontal" novalidate="">

                    <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Photo</label>
                            <div class="col-sm-10">
                            <img src="{{asset(Auth::user()->profile)}}" alt="profile is here" height="250" width="250" id="profileplace"/>

                                <input type="file" id="profile" name="profile" value="">
                        
                            
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nameprofile" name="nameprofile"
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
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save changes
                    </button>
                    <input type="hidden" id="name_id" name="name_id" value="{{$pro2->id}}">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



@foreach ($profile as $postakun)
    <div class="post1">
        <img src="{{asset(Auth::user()->profile)}}" alt="profile is here"
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
        <p2>
            <div class="commentgas">
                <a href="/commentinfo/{{$postakun->id}}">
                    <button type="submit" class="btn btn-primary btn-sm">Comment</button>
            </div>
        </p2>
        
        
        <br>
        <hr>
        <p1>{{$postakun->like}}</p1>
        <p2> Like This Post</p2>
        <p1> </p1>
        <p2> </p2>


        <div class="nama">
            <div id="post2text" class="post1">
                <p3>{{$postakun->userkepost->name}}</p3>
                <p2> </p2>
                <p1> </p1>
                <p2> </p2>
                <p1>   
                    <br>
                <p4>{{$postakun->created_at}}</p4>
            </div>
        </div>

        <div class="togle">
        <form action="/hapuspost/{{$postakun->id}}" method="POST">
                      @csrf
                      @method('DELETE')            
                <div class="btn-ak">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <button href='{{$postakun->id}}' class="dropdown-item" href="/hapuspost">Delete Post</a>
                    </div>
                </div>
            </form>
        </div>
            
        <form action="/comment/{{$postakun->id}}" method="POST">
        @csrf
            <div id="commentboxpos2" class="post1">
                <input type="text" placeholder="comment" id="commentbox" name="comment"/>
            </div>

            <div class = "commentkuy">
                <button type="submit" class="btn btn-success btn-group-sm">></button>
            </div>
        </form>
    </div>
    @endforeach

    @foreach ($profile2 as $postakun)
    <div class="post1">
        <img src="{{asset(Auth::user()->profile)}}" alt="profile is here"
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
        <p2>
            <div class="commentgas">
                <a href="/commentinfo/{{$postakun->id}}">
                    <button type="submit" class="btn btn-primary btn-sm">Comment</button>
            </div>
        </p2>
        
        
        <br>
        <hr>
        <p1>{{$postakun->like}}</p1>
        <p2> Like This Post</p2>
        <p1> </p1>
        <p2> </p2>


        <div class="nama">
            <div id="post2text" class="post1">
                <p3>{{$postakun->userkepost->name}}</p3>
                <p2> </p2>
                <p1> </p1>
                <p2> </p2>
                <p1>   
                    <br>
                <p4>{{$postakun->created_at}}</p4>
            </div>
        </div>

        <div class="togle">
        <form action="/hapuspost/{{$postakun->id}}" method="POST">
                      @csrf
                      @method('DELETE')            
                <div class="btn-ak">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <button href='{{$postakun->id}}' class="dropdown-item" href="/hapuspost">Delete Post</a>
                    </div>
                </div>
            </form>
        </div>
            
        <form action="/comment/{{$postakun->id}}" method="POST">
        @csrf
            <div id="commentboxpos2" class="post1">
                <input type="text" placeholder="comment" id="commentbox" name="comment"/>
            </div>

            <div class = "commentkuy">
                <button type="submit" class="btn btn-success btn-group-sm">></button>
            </div>
        </form>
    </div>
    @endforeach
    

  