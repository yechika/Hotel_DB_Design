@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
        <div class="row">
        @if($pendingBookingsCount > 0)
        <div class="col-12">
            <div class="alert alert-warning">
                <strong>Notice:</strong> You have {{ $pendingBookingsCount }} pending bookings awaiting approval.
                <a href="{{ url('bookings') }}" class="alert-link">View Bookings</a>
            </div>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="font-semibold text-muted">Users</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $userCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="bi bi-house-door-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="font-semibold text-muted">Rooms</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $roomCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-calendar-check-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="font-semibold text-muted">Bookings</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $bookingCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="font-semibold text-muted">Messages</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $messageCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Room Bookings by Type</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="max-width: 400px; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Monthly Bookings</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="max-width: 700px; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Users</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone Number</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users ?? [] as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                <form action="{{ url('/update_usertype/'.$user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="usertype" class="form-control form-control-sm" onchange="this.form.submit()">
                                        <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </form>
                                </td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if(Auth::id() != $user->id)
                                    <form action="{{ url('/delete_user/'.$user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    @endif
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($roomBookings->keys()) !!}, 
            datasets: [{
                label: 'Room Bookings',
                data: {!! json_encode($roomBookings->values()) !!}, 
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverOffset: 4
            }]
        },
        options: {
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 14,
                        weight: 'bold'
                    },
                    color: '#ffffff',
                    textShadow: '1px 1px 0 #fff',
                    padding: 20
                },
                position: 'bottom'
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.8)',
                padding: 10,
                titleFont: {
                    size: 14
                },
                bodyFont: {
                    size: 14
                }
            }
        }
    }
    });

    const barCtx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!}, 
            datasets: [{
                label: 'Bookings',
                data: {!! json_encode($monthlyBookings) !!}, 
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection