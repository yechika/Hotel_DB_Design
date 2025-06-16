@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Gallery</h3>
</div>
<div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Gallery</h1>
                <center>
                    <div class="row">
                        @foreach ($gallery as $gallery)
                        <div class="mb-4 col-md-4">
                            <div class="image-container">
                                <img style="height: 200px; width: 100%; object-fit: cover;" src="/gallery/{{ $gallery->image }}" alt="">
                                <a href="{{ url('delete_gallery', $gallery->id) }}" class="mt-2 btn btn-danger d-block">Delete</a>
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
@endsection