@extends('Dashboard.main.master')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>Student Profile</h4>
                </div>
                <div class="col p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                        <li class="breadcrumb-item active">{{ $student->name }}</li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Student Information</h4>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Student ID: {{ $student->username }}</h5>
                                    <p><strong>Name:</strong> {{ $student->name }}</p>
                                    <p><strong>Email:</strong> {{ $student->email }}</p>
                                    
                                    <h6>Roles:</h6>
                                    <ul>
                                        @foreach ($student->roles as $role)
                                            <li>{{ $role->display_name }}</li>
                                        @endforeach
                                    </ul>

                                    <h6>Permissions:</h6>
                                    <ul>
                                        @foreach ($student->permissions as $permission)
                                            <li>{{ $permission->display_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                <div class="col-lg-6">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Book Title</th>
                                                <th>Borrowed On</th>
                                                <th>Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($borrowedBooks as $book)
                                                <tr>
                                                    <td>{{ $book->name }}</td>
                                                    <td>
                                                        @if ($book->pivot->borrowed_at)
                                                            {{ \Carbon\Carbon::parse($book->pivot->borrowed_at)->format('d-m-Y') }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($book->pivot->due_date)
                                                            {{ \Carbon\Carbon::parse($book->pivot->due_date)->format('d-m-Y') }}
                                                        @else
                                                            N/A
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
            </div>
        </div>
    </div>
@endsection
