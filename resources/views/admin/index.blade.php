<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div id="app">
        @include('admin.sidebar')
        <div id="main">
            @include('admin.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('admin.footer')
        </div>
    </div>
</body>

</html>