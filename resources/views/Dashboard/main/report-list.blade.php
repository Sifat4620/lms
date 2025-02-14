@extends('Dashboard.main.master')
@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
               
                <div class="col p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                        <li class="breadcrumb-item active">Book Borrowing Report</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Book Borrowing Report</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Title</th>
                                            <th>Student ID</th>
                                            <th>Borrow ID</th>
                                            <th>Status</th>
                                            <th>Borrow Date</th>
                                            <th>Return Date</th>
                                            <th>Action Required</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Demo Row 1 -->
                                        <tr>
                                            <th>1</th>
                                            <td>The Great Gatsby</td>
                                            <td>12345</td>
                                            <td>BG-2023-001</td>
                                            <td><span class="badge badge-primary">Borrowed</span></td>
                                            <td>2025-02-01</td>
                                            <td>2025-02-15</td>
                                            <td><span class="badge badge-warning">Need to Order</span></td>
                                        </tr>
                                        <!-- Demo Row 2 -->
                                        <tr>
                                            <th>2</th>
                                            <td>1984 by George Orwell</td>
                                            <td>67890</td>
                                            <td>BG-2023-002</td>
                                            <td><span class="badge badge-success">Returned</span></td>
                                            <td>2025-01-20</td>
                                            <td>2025-02-05</td>
                                            <td><span class="badge badge-secondary">No Action</span></td>
                                        </tr>
                                        <!-- Demo Row 3 -->
                                        <tr>
                                            <th>3</th>
                                            <td>To Kill a Mockingbird</td>
                                            <td>54321</td>
                                            <td>BG-2023-003</td>
                                            <td><span class="badge badge-danger">Overdue</span></td>
                                            <td>2025-01-15</td>
                                            <td>2025-01-30</td>
                                            <td><span class="badge badge-danger">Urgent Order</span></td>
                                        </tr>
                                        <!-- Demo Row 4 -->
                                        <tr>
                                            <th>4</th>
                                            <td>Pride and Prejudice</td>
                                            <td>11223</td>
                                            <td>BG-2023-004</td>
                                            <td><span class="badge badge-primary">Borrowed</span></td>
                                            <td>2025-02-10</td>
                                            <td>2025-02-24</td>
                                            <td><span class="badge badge-warning">Need to Order</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Total Borrowed Books -->
                            <div class="mt-4">
                                <h5>Total Borrowed Books: 4</h5>
                                <p>Total Books that Need to be Ordered: 2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
