<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
    .table_deg {
        border: 1px solid #ddd;
        margin: auto;
        width: 80%;
        text-align: center;
        margin-top: 40px;
        background-color: #fff5f5; /* Light red background for the table */
        border-radius: 8px; /* Rounded corners */
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .th_deg {
        background-color: #d9534f; /* Red theme for the header */
        color: white;
        padding: 15px;
        font-weight: bold;
        text-transform: uppercase;
    }

    tr {
        border-bottom: 1px solid #ddd;
    }

    tr:last-child {
        border-bottom: none;
    }

    td {
        padding: 12px;
        color: #333; /* Darker text for readability */
    }

    tr:nth-child(even) {
        background-color: #ffecec; /* Alternate row colors with a light red tint */
    }

    tr:hover {
        background-color: #f8d7da; /* Highlight row on hover with a soft red */
    }

    /* Status-specific row colors */
    .table-warning {
        background-color: #fff3cd !important; /* Light yellow for waiting */
    }

    .table-success {
        background-color: #d4edda !important; /* Light green for approved */
    }

    .table-danger {
        background-color: #f8d7da !important; /* Light red for rejected */
    }
</style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>


    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="{{url('/')}}">
                                    <h2 style="font-weight: 700; padding-top: 8px; font-size: 30px;">AUREVO</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="mr-auto navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('about_page') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('hotel_gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item active">
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

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Arrival Date</th>
                        <th class="th_deg">Leaving Date</th>
                        <th class="th_deg">Room Name</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Total Price</th>
                    </tr>
                    @foreach ($bookings as $booking)
                                        @php
                                            $start = \Carbon\Carbon::parse($booking->end_date);
                                            $end = \Carbon\Carbon::parse($booking->start_date);
                                            $days = $end->diffInDays($start);
                                            $totalPrice = $days * $booking->room->price;
                                        @endphp
                                        <tr class="
                            @if($booking->status == 'waiting') table-warning 
                            @elseif($booking->status == 'Approved') table-success
                            @elseif($booking->status == 'Rejected') table-danger 
                            @endif
                        ">
                                            <td>{{ $booking->status }}</td>
                                            <td>{{ $booking->start_date }}</td>
                                            <td>{{ $booking->end_date }}</td>
                                            <td>{{ $booking->room->room_title }}</td>
                                            <td>{{ $booking->room->room_type }}</td>
                                            <td>Rp {{ number_format($totalPrice, 0, ',', '.') }}</td> 
                                        </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>
    @include('home.footer')


</body>

</html>