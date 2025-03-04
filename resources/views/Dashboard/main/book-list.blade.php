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
                        <li class="breadcrumb-item active">Book Information</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Book Information</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Book ID</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $index => $book)
                                            <tr>
                                                <th>{{ $index + 1 }}</th>
                                                <td>{{ $book->name }}</td>
                                                <td>{{ $book->book_id }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $book->status == 'on_store' ? 'primary' : 'success' }}">
                                                        {{ ucfirst($book->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $book->created_at->format('d M') }}</td>
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
