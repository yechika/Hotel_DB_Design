<!DOCTYPE html>
<html lang="en">

<head>
   @include('home.css')
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>

      <!-- header inner -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="{{url('/')}}">
                              <h2 style="font-weight: 700; padding-top: 14px; font-size: 30px;">AUREVO</h2>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('/')}}">Home</a>
                           </li>
                           <li class="nav-item ">
                              <a class="nav-link" href="{{ url('about_page') }}">About</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="{{ url('hotel_gallery') }}">Gallery</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{ url('history') }}">History</a>
                           </li>
                           <!-- <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                     </li> -->
                           <!-- <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                     </li> -->



                           @if (Route::has('login'))
                           @auth
                  <li class="nav-item">
                   <span style="font-weight: bold; font-size: 18px; color: #000;">|</span>
                  </li>
                  <li class="nav-item">
                   <a href="#" class="nav-link">Welcome, {{ Auth::user()->name }}</a>
                  </li>
                  <li class="nav-item" style="padding-right:10px;">
                   <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit" class="btn btn-danger">Logout</button>
                   </form>
                  </li>
               @else
                           <li class="nav-item" style="padding-right:10px;">
                              <a class="btn btn-success" href="{{url('login')}}">Login</a>
                           </li>

                           @if (Route::has('register'))
                           <li class="nav-item">
                              <a class="btn btn-primary" href="{{url('register')}}">Register</a>
                           </li>
                           @endif
                           @endauth

                           @endif
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->

   @include('home.gallery')
   <!-- end gallery -->
   <!-- blog -->

   <!-- end blog -->
   <!--  contact -->
   <!-- @include('home.contact') -->
   <!-- end contact -->
   <!--  footer -->
   @include('home.footer')
   <!-- end footer -->
   <!-- Javascript files-->

</body>

</html>