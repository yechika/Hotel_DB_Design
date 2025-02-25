<div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <!-- <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
                <div class="title">
                    <h1 class="h5">
                    <div class="font-medium text-base text-gray-800">Welcome, {{ Auth::user()->name }}</div>
                    </h1>
                </div>
            </div>
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active"><a href="/home"> <i class="icon-home"></i>Home </a></li>
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
            <li>
                <a href="{{ url('all_messages') }}">
                    <i class="icon-writing-whiteboard"></i>
                    Messages
                </a>
            </li>
            </ul>
        </nav>