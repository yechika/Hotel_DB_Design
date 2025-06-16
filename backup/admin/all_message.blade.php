<!DOCTYPE html>
<html>

<head>
<style>
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: #DB6574;
            padding: 15px;
            color: white;
        }

        tr {
            border: 3px solid white;
        }

        td {
            padding: 10px;
        }
    </style>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <!-- <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
                <div class="title">
                    <h1 class="h5">
                        <div class="text-base font-medium text-gray-800">Welcome, {{ Auth::user()->name }}</div>
                    </h1>
                </div>
            </div>
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li><a href="/home"> <i class="icon-home"></i>Home </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms</a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{url('create_room')}}">Add Rooms</a></li>
                        <li><a href="{{url('view_room')}}">View Rooms</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('bookings') }}">
                        <i class="icon-padnote"></i>
                        Bookings
                    </a>
                </li>
                <li>
                    <a href="{{ url('view_gallery') }}">
                        <i class="icon-grid"></i>
                        Gallery
                    </a>
                </li>
                <li class="active">
                    <a href="{{ url('all_messages') }}">
                        <i class="icon-writing-whiteboard"></i>
                        Messages
                    </a>
                </li>
            </ul>
        </nav>
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                <table class="table_deg">
                        <tr>
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Message</th>
                        </tr>
                        @foreach ($data as $data)
                        
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td>{{ $data->user->phone }}</td>
                            <td>{{ $data->message }}</td>
                        </tr>
                        
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>