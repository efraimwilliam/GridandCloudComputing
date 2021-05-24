@extends('layouts.head')

<body>
  
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
     <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav">

          <a class="nav-link navlogo text-center" href="/home">
            <img src="{{asset(Auth::user()->profile)}}">
          </a>

        <li class="nav-item">
          <a class="nav-link sidefrst" href="/home">
            <span class="textside">  Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidefrst" href="/profile/{{Auth::user()->id}}">
            <span class="textside">  Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesthrd" href="/following/{{Auth::user()->id}}">
            <span class="textside">  List</span>
          </a>
        </li>

      </ul>
      
      <ul class="navbar-nav2 ml-auto">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome {{Auth::user()->name}}</a>
            <ul class="dropdown-menu">
                <li class="resflset"><a href="/profile/{{Auth::user()->id}}"><i class="fa fa-fw fa-power-off"></i> Profile</a></li>
                <li class="resflset"><a href="/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
      
    </div>
  </nav>

  



</body>