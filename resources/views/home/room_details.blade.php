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
      .our_room {
  padding: 60px 0;
  background-color: #f9f9f9;
  font-family: 'Poppins', sans-serif;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -15px;
}

.col-md-12 {
  width: 100%;
  padding: 0 15px;
}

.col-md-8 {
  width: 66.66%;
  padding: 0 15px;
}

.col-md-4 {
  width: 33.33%;
  padding: 0 15px;
}

/* Title Section */
.titlepage {
  text-align: center;
  margin-bottom: 50px;
}

.titlepage h2 {
  font-size: 42px;
  color: #222;
  font-weight: 700;
  margin-bottom: 15px;
  position: relative;
  display: inline-block;
}

.titlepage h2:after {
  content: '';
  position: absolute;
  width: 60px;
  height: 3px;
  background: #red;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
}

.titlepage p {
  font-size: 16px;
  color: #666;
  max-width: 700px;
  margin: 0 auto;
}

/* Room Card */
.room {
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.room:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

/* Room Image */
.room_img {
  position: relative;
  overflow: hidden;
}

.room_img img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  transition: transform 0.5s ease;
  display: block;
}

.room:hover .room_img img {
  transform: scale(1.05);
}

/* Price Badge */
.price_badge {
  position: absolute;
  bottom: 20px;
  right: 20px;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
  padding: 10px 15px;
  border-radius: 8px;
  font-weight: bold;
}

.price_badge span {
  font-size: 20px;
  display: block;
}

.price_badge small {
  font-size: 12px;
  opacity: 0.8;
}

/* Room Details */
.bed_room {
  padding: 25px;
}

.bed_room h3 {
  color: #333;
  font-size: 24px;
  margin-top: 0;
  margin-bottom: 15px;
  font-weight: 600;
}

.bed_room p {
  color: #666;
  font-size: 15px;
  line-height: 1.6;
  margin-bottom: 20px;
}

/* Room Features */
.room_features {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-top: 20px;
}

.feature {
  display: flex;
  align-items: center;
  background: #f5f5f5;
  padding: 8px 15px;
  border-radius: 50px;
}

.feature i {
  color: red;
  margin-right: 8px;
  font-size: 16px;
}

.feature span {
  font-size: 14px;
  color: #555;
}

/* Booking Form */
.booking_form {
  background: #fff;
  padding: 30px;
  width: 450px;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.booking_form h1 {
  font-size: 28px;
  color: #333;
  margin-top: 0;
  margin-bottom: 25px;
  position: relative;
  padding-bottom: 10px;
}

.booking_form h1:after {
  content: '';
  position: absolute;
  width: 50px;
  height: 3px;
  background: red;
  bottom: 0;
  left: 0;
}

/* Form Styling */
.form_group {
  margin-bottom: 20px;
}

.form_group label {
  display: block;
  font-size: 14px;
  color: #555;
  margin-bottom: 8px;
  font-weight: 500;
}

.form_group input[type="text"],
.form_group input[type="number"],
.form_group input[type="date"] {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 14px;
  transition: border-color 0.3s ease;
}

.form_group input[readonly] {
  background-color: #f9f9f9;
  cursor: not-allowed;
}

.form_group input:focus {
  border-color: red;
  outline: none;
}

/* Book Button */
.book_btn {
  color: white;
  border: none;
  padding: 14px 28px;
  border-radius: 50px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  width: 100%;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-top: 10px;
}

.book_btn:hover {
  box-shadow: 0 5px 15px rgba(255, 152, 0, 0.4);
}

/* Alert Messages */
.alert {
  padding: 15px;
  border-radius: 5px;
  margin-bottom: 20px;
  position: relative;
}

.alert-success {
  background-color: #d4edda;
  border: 1px solid #c3e6cb;
  color: #155724;
}

.alert-warning {
  background-color: #fff3cd;
  border: 1px solid #ffeeba;
  color: #856404;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
}

/* Error List */
.error_list {
  margin-bottom: 20px;
}

.error_list li {
  color: #dc3545;
  font-size: 14px;
  list-style-type: none;
  margin-bottom: 5px;
}

/* Responsive Design */
@media (max-width: 992px) {
  .col-md-8, .col-md-4 {
    width: 100%;
  }
  
  .booking_form {
    margin-top: 30px;
  }
}

@media (max-width: 576px) {
  .titlepage h2 {
    font-size: 32px;
  }
  
  .room_features {
    flex-direction: column;
  }
  
  .bed_room h3 {
    font-size: 20px;
  }
}
</style>

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
                        <h2 style="font-weight: 700; padding-top: 8px; font-size: 30px; color: black;"
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
                  <ul class="mr-auto navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('about_page') }}">About</a>
                     </li>
                     <li class="nav-item active">
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
                  <p>Experience luxury and comfort—book your room today for an unforgettable stay!</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-8">
               <div id="serv_hover" class="room">
                  <div class="room_img">
                     <img src="room/{{$room->image}}" alt="#" />
                     <div class="price_badge">
                        <span>Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                        <small>/day</small>
                     </div>
                  </div>
                  <div class="bed_room">
                     <h3>{{$room->room_title}}</h3>
                     <p>{{$room->description}}</p>
                     <div class="room_features">
                        <div class="feature">
                           <i class="fa fa-wifi"></i>
                           <span>Free Wifi: {{$room->wifi}}</span>
                        </div>
                        <div class="feature">
                           <i class="fa fa-bed"></i>
                           <span>Room Type: {{$room->room_type}}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="booking_form">
                  <h1>Book Room</h1>
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
                  <div class="error_list">
                     @foreach($errors->all() as $errors)
                     <li>
                        {{ $errors }}
                     </li>
                     @endforeach
                  </div>
                  @endif
                  <form action="{{ url('add_booking', $room->id) }}" method="Post">
                     @csrf
                     <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                     <div class="form_group">
                        <label for="">Name</label>
                        <input type="text" name="name"
                           @if(Auth::id())
                           value="{{ Auth::user()->name }}"
                           @endif
                           readonly>
                     </div>
                     <div class="form_group">
                        <label for="">Email</label>
                        <input type="text" name="email"
                           @if(Auth::id())
                           value="{{ Auth::user()->email }}"
                           @endif
                           readonly>
                     </div>
                     <div class="form_group">
                        <label for="">Phone</label>
                        <input type="number" name="phone"
                           @if(Auth::id())
                           value="{{ Auth::user()->phone }}"
                           @endif
                           readonly>
                     </div>
                     <div style="display: flex; gap: 2px;">               
                        <div class="form_group">
                           <label for="">Start Date</label>
                           <input type="date" name="startDate" id="startDate" required>
                        </div>
                        <div class="form_group">
                           <label for="">End Date</label>
                           <input type="date" name="endDate" id="endDate" required>
                        </div>
                     </div>
                     <div class="form_group">
                        <input type="submit" value="Book Room" class="book_btn">
                     </div>
                  </form>
               </div>
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