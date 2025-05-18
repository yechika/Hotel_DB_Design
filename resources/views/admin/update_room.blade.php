@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Update Room</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <h4>Update Room Details</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="title">Room Title</label>
                            <input type="text" name="title" id="title" value="{{ $data->room_title }}" class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control" required>{{ $data->description }}</textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" value="{{ $data->price }}" class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="type">Room Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="Regular" {{ $data->room_type == 'Regular' ? 'selected' : '' }}>Regular</option>
                                <option value="Premium" {{ $data->room_type == 'Premium' ? 'selected' : '' }}>Premium</option>
                                <option value="Deluxe" {{ $data->room_type == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="wifi">Free Wifi</label>
                            <select name="wifi" id="wifi" class="form-control" required>
                                <option value="Yes" {{ $data->wifi == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $data->wifi == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Room</button>
                        <a href="{{ url('view_room') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection