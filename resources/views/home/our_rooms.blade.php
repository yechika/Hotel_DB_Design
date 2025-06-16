<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<style>
    .form-select:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .gap-2 {
        gap: 0.5rem;
    }

    .room_img {
        position: relative;
        overflow: hidden;
    }

    .room-type-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: bold;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .pagination {
        margin-bottom: 2rem;
    }

    .pagination .page-item.active .page-link {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .pagination .page-link {
        color: #dc3545;
    }

    .pagination .page-link:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>

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
    <!-- @include('home.room') -->
     <div class="our_room">
   <div class="container">
      <div class="mb-4 row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Room</h2>
               <p>Experience luxury and comfort—book your room today for an unforgettable stay!</p>
            </div>
         </div>
      </div>

      <!-- Search and Filter Form -->
      <div class="mb-4 row">
         <div class="col-md-8 offset-md-2">
            <form action="{{ url('/our_rooms') }}" method="GET" class="gap-2 d-flex">
               <input type="text" name="search" class="form-control" 
                      placeholder="Search rooms..." value="{{ request('search') }}">
               <select name="type" class="form-select" style="width: auto;">
                  <option value="">All Types</option>
                  <option value="Regular" {{ request('type') == 'Regular' ? 'selected' : '' }}>Regular</option>
                  <option value="Premium" {{ request('type') == 'Premium' ? 'selected' : '' }}>Premium</option>
                  <option value="Deluxe" {{ request('type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
               </select>
               <button type="submit" class="btn btn-danger">Filter</button>
               @if(request('search') || request('type'))
                  <a href="{{ url('/our_rooms') }}" class="btn btn-secondary">Clear</a>
               @endif
            </form>
         </div>
      </div>

      <!-- Room Cards -->
      <div class="row">
         @forelse($room as $rooms)
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
               <div class="room_img">
                    <img style="height: 350px; width: 100%; object-fit: cover;" 
                        src="room/{{$rooms->image}}" alt="Room Image" />
                    <span class="room-type-badge">{{$rooms->room_type}}</span>
                </div>
               <div class="bed_room">
                    <h3>{{$rooms->room_title}}</h3>
                    <p style="padding: 10px;">{!! Str::limit($rooms->description, 100) !!}</p>
                    <div class="d-flex justify-content-center align-items-center" style="padding: 10px 0 15px 0;">
                        @auth
                        <a href="{{url('room_details', $rooms->id)}}" class="btn btn-danger">Room Details</a>
                        @else
                        <a href="{{url('/login')}}" class="btn btn-danger">Room Details</a>
                        @endauth
                    </div>
                </div>
            </div>
         </div>
         @empty
         <div class="text-center col-12">
            <p>No rooms found matching your criteria.</p>
         </div>
         @endforelse
      </div>

      <!-- Pagination -->
        <div class="mt-4 row">
            <div class="text-center col-md-12">
                <div>
                    {{ $room->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
   </div>
</div>
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
</body>

</html>