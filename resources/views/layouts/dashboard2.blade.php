@extends('layouts.head2')

<body>
    <!--===============================================
                      NAVBAR
===============================================-->


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="hamburger">
            <div class="cta">
                <div class="toggle-btn type14"></div>
            </div>
        </div>

        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
    <img src="https://api.duniagames.co.id/api/content/upload/file/13417368091612526660.jpg" alt="logo" style="width:140px;">
  </a>

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="images/notification.png" alt=""></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="images/sms.png" alt=""></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="images/user.png" alt=""></a>
            </li>
        </ul>
    </nav>


    <section class="side-bar-warp">
        <div class="sidebar-menu small-side-bar flowHide">
            <nav class="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-icon"><img src="images/dashboard.png" alt=""></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-icon"><img src="images/create-quest.png" alt=""></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="sidebar-icon"><img src="images/log-out.png" alt=""></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Log Out</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        
    </section>

</body>


		
</html>