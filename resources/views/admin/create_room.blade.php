@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Create Room</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Room Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="type">Room Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="Regular">Regular</option>
                        <option value="Premium">Premium</option>
                        <option value="Deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wifi">Free Wifi</label>
                    <select name="wifi" id="wifi" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" style="margin-bottom: 10px;">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Room</button>
            </form>
        </div>
    </div>
</section>
@endsection