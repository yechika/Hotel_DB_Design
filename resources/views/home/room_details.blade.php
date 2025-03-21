<!DOCTYPE html>
<html lang="en">

<head>
   <base href="/public">
   @include('home.css')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style type="text/css">
      label {
         display: inline-block;
         width: 200px;
      }

      input {
         width: 100%;
      }
   </style>
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
                        <h2 style="font-weight: 700; padding-top: 8px; font-size: 30px;"
                        >AUREVO</h2>
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
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('about_page') }}">About</a>
                     </li>
                     <li class="nav-item  active">
                        <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('hotel_gallery') }}">Gallery</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('history') }}">History</a>
                     </li>
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
   <div class="our_room">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Our Room</h2>
                  <p>Lorem Ipsum available, but the majority have suffered </p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-8">
               <div id="serv_hover" class="room">
                  <div style="padding:20px" class="room_img">
                     <img
                        style="height: 300px; width: 800px;"
                        src="room/{{$room->image}}" alt="#" />
                  </div>
                  <div class="bed_room">
                     <h3>{{$room->room_title}}</h3>
                     <p style="padding:12px">{{$room->description}}</p>
                     <h4 style="padding:12px">Free Wifi: {{$room->wifi}}</h4>
                     <h4 style="padding:12px">Room Type: {{$room->room_type}}</h4>
                     <h3 style="padding:12px">Price: Rp {{ number_format($room->price, 0, ',', '.') }}/day</h3>
                     
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <h1 style="font-size: 40px;">Book Room</h1>
               <div>
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                     {{ session()->get('message') }}
                  </div>
                  @elseif(session()->has('messageBooked'))
                  <div class="alert alert-warning">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                     {{ session()->get('messageBooked') }}
                  </div>
                  @endif
               </div>
               @if($errors)
               @foreach($errors->all() as $errors)
               <li style="color: red;">
                  {{ $errors }}
               </li>
               @endforeach
               @endif
               <form action="{{ url('add_booking', $room->id) }}" method="Post">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <div>
                     <label  for="">Name</label>
                     <input style="cursor: not-allowed;" type="text" name="name"
                        @if(Auth::id())
                        value="{{ Auth::user()->name }}"
                        @endif
                        readonly>
                  </div>
                  <div>
                     <label for="">Email</label>
                     <input style="cursor: not-allowed;" type="text" name="email"
                        @if(Auth::id())
                        value="{{ Auth::user()->email }}"
                        @endif
                        readonly>
                  </div>
                  <div>
                     <label for="">Phone</label>
                     <input style="cursor: not-allowed;" type="number" name="phone"
                        @if(Auth::id())
                        value="{{ Auth::user()->phone }}"
                        @endif
                        readonly>
                  </div>
                  <div>
                     <label for="">Start Date</label>
                     <input type="date" name="startDate" id="startDate" required>
                  </div>
                  <div>
                     <label for="">End Date</label>
                     <input type="date" name="endDate" id="endDate" required>
                  </div>
                  <div style="padding-top: 20px;">
                     <input type="submit" value="Book Room" class="btn btn-primary">
                  </div>
               </form>


            </div>
         </div>
      </div>
   </div>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <!-- end contact -->
   <!--  footer -->
   @include('home.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script type="text/javascript">
      $(function() {
         var dtToday = new Date();
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if (month < 10)
            month = '0' + month.toString();
         if (day < 10)
            day = '0' + day.toString();
         var maxDate = year + '-' + month + '-' + day;
         $('#startDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);

      });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>