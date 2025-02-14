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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a>
                            </li>
                            <li class="breadcrumb-item active">Student Information</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Table Basic</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>202084</td>
                                                <td>7154</td> 
                                                <td class="color-primary">Sakib</td>
                                                <td><span class="badge badge-danger">Inactive</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>7840224</td>
                                                <td>4524</td> 
                                                <td class="color-success">Sifat</td>
                                                <td><span class="badge badge-success">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- #/ container -->
        </div>
@endsection
