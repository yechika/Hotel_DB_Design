<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
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
                <li class="active">
                    <a href="{{ url('view_gallery') }}">
                        <i class="icon-grid"></i>
                        Gallery
                    </a>
                </li>
                <li >
                    <a href="{{ url('all_messages') }}">
                        <i class="icon-writing-whiteboard"></i>
                        Messages
                    </a>
                </li>
            </ul>
            </ul>
        </nav>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Gallery</h1>
                <center>
                    <div class="row">
                        @foreach ($gallery as $gallery)
                        <div class="col-md-4 mb-4">
                            <div class="image-container">
                                <img style="height: 200px; width: 100%; object-fit: cover;" src="/gallery/{{ $gallery->image }}" alt="">
                                <a href="{{ url('delete_gallery', $gallery->id) }}" class="btn btn-danger mt-2 d-block">Delete</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <form action="{{ url('upload_gallery') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div style="padding-top: 30px;">
                            <label style="color: white;" for="">Upload Image</label>
                            <input type="file" name="image" required>
                            <input class="btn btn-primary" type="submit" value="Add Image">
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>