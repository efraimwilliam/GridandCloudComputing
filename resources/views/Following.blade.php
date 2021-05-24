@extends('layouts.head')
@extends('layouts.dashboard')


    <div class="profile-container">
        <div class="row row-space-20">
            <div class="col-md-8">
                <div class="tab-content p-0">

                    <div class="tab-pane fade active show" id="profile-friends">
                        <div class="m-b-10"><b>Friend List {{$numberfollowing}}</b></div>

                        <ul class="friend-list clearfix">
                            <li>
                            @foreach ($following as $mengikuti)
                                <a href="/profilepost/{{$mengikuti->followingkeuser->id}}">
                                    <div class="friend-img"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" /></div>
                                    <div class="friend-info">
                                        <h4>{{$mengikuti->followingkeuser->name}}</h4>
                                        <p>{{$mengikuti->followingkeuser->bio}}</p>
                                    </div>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
           

            