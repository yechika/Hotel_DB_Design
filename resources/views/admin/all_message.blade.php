@extends('admin.index')

@section('content')
<div class="page-heading">
    <h3>Reviews</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Reviews</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody> 
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td>{{ $data->user->phone }}</td>
                            <td>{{ $data->message }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
      <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                <table class="table_deg">

                    </table>
                </div>
            </div>
        </div>
@endsection