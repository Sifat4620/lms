@extends('Dashboard.main.master')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>Hello, <span>Welcome here</span></h4>
                </div>
                <div class="col p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active">Student Information</li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Student List</h4>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Roles</th>
                                            <th>Permissions</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $index => $student)
                                            <tr>
                                                <th>{{ $index + 1 }}</th>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->username }}</td>
                                                <td class="color-primary">{{ $student->name }}</td>
                                                <td>
                                                    @foreach ($student->roles as $role)
                                                        {{ $role->display_name }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($student->permissions as $permission)
                                                        {{ $permission->display_name }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($student->is_active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-success">Active</span>
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
@endsection
