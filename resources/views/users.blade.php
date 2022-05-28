@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>
                @if(Auth::user()->role == 'admin')
                <div class="col-md-2">
                <a href="{{ url('dummy-users') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                  <strong>Insert Users</strong>
                                </a> 
                </div>
                @endif
                <div class="card-body">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                <table class="table table-bordered data-table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Income</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Occupation</th>
                            <th>Family Type</th>
                            <th>Manglik</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                               
                                <td>₹{{ $user->min_income }} - ₹{{ $user->max_income }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->occupation }}</td>
                                <td>{{ $user->family_type }}</td>
                                <td>{{ $user->manglik }}</td>
                                <td>{{ ucfirst($user->status) }}</td>
                            </tr>
                        @endforeach

                      
                    </tbody>
                  
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
@endsection

@endsection
