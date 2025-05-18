<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        .div_deg {
            padding-top: 30px;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }
    </style>
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
                <li><a href="#exampledropdownDropdown" aria-expanded="true" data-toggle="collapse">
                        <i class="icon-windows"></i>Hotel Rooms</a>
                    <ul id="exampledropdownDropdown" class="list-show collapse show ">
                        <li class="active"><a href="{{url('create_room')}}">Add Rooms</a></li>
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

                    <div class="div_center">
                        <h1 style="
                        font-size: 30px;
                        font-weight: bold;
                    ">Add Rooms</h1>
                        <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_deg">
                                <label for="">Room Title</label>
                                <input type="text" name="title">
                            </div>
                            <div class="div_deg">
                                <label for="">Description</label>
                                <textarea name="description" id=""></textarea>
                            </div>
                            <div class="div_deg">
                                <label for="">Price</label>
                                <input type="number" name="price">
                            </div>
                            <div class="div_deg">
                                <label for="">Room Type</label>
                                <select name="type" id="">
                                    <option value="Regular">Regular</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label for="">Free Wifi</label>
                                <select name="wifi" id="">
                                    <option selected value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label for="">Upload Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="div_deg">
                                <input class="btn btn-primary" type="submit" value="Add Room">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>