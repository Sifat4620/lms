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
                            <li class="breadcrumb-item active">Book Information</li>
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
                                                <th>Book ID</th>
                                                <th>Status</th>
                                                <th>Entry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>English Book 101</td> 
                                                <td>#4501</td>
                                                <td><span class="badge badge-primary">On Store</span>
                                                </td>
                                                <td class="color-primary">5 Jan</td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>English Book 102</td>
                                                <td>#4508</td>
                                                <td><span class="badge badge-success">On Store</span>
                                                </td>
                                                <td class="color-success">10 Feb</td>
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