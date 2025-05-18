@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>View Rooms</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Rooms</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Wifi</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td class="text-center align-middle">{{ $data->room_title }}</td>
                                <td class="align-middle">{!! Str::limit($data->description, 150) !!}</td>
                                <td class="text-center align-middle">{{ $data->price }}</td>
                                <td class="text-center align-middle">{{ $data->room_type }}</td>
                                <td class="text-center align-middle">{{ $data->wifi }}</td>
                                <td class="text-center align-middle">
                                    <img src="{{ asset('room/' . $data->image) }}" alt="Room Image" width="50">
                                </td>
                                <td class="text-center align-middle">
                                    <!-- Dropdown for actions -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $data->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $data->id }}">
                                            <li>
                                                <a href="{{ url('room_update', $data->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('room_delete', $data->id) }}" class="dropdown-item">
                                                    <i class="bi bi-trash-fill"></i> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection