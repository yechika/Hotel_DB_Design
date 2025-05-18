@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Bookings</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Bookings</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Customer name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Status</th>
                            <th>Room Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td>{{ $data->user->phone }}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->end_date }}</td>
                            <td>
                                @if($data->status == 'Approved')
                                <span style="color: skyblue;">Approved</span>
                                @endif
                                @if($data->status == 'Rejected')
                                <span style="color: red;">Rejected</span>
                                @endif
                                @if($data->status == 'waiting')
                                <span style="color: yellow;">Waiting</span>
                                @endif
                            </td>
                            <td>{{ $data->room->room_title }}</td>
                            <td>{{ $data->room->price }}</td>
                            <td>
                                <img style="width: 150px;;" src="/room/{{ $data->room->image }}" alt="">
                            </td>
                            <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $data->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $data->id }}">
                                            <li>
                                                <!-- <a href="{{ url('delete_booking', $data->id) }}" class="dropdown-item">
                                                    <i class="bi bi-trash-fill"></i> Delete
                                                </a> -->
                                                <form action="{{ url('delete_booking', $data->id) }}">
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('approve_book', $data->id) }}">
                                                    <button type="submit" class="dropdown-item text-success">
                                                        <i class="bi bi-check-circle"></i> Approve
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('reject_book', $data->id) }}">
                                
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-x-circle"></i> Reject
                                                    </button>
                                                </form>
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