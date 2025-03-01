@extends('Dashboard.main.master')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>Available Books</h4>
                </div>
                <div class="col p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Books</a></li>
                        <li class="breadcrumb-item active">Borrow Books</li>
                    </ol>
                </div>
            </div>

            <!-- Display Success/Error messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Available Books</h4>
                            </div>
            
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Author</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $book->name }}</td>
                                                <td>{{ $book->writer }}</td>
                                                <td>{{ Str::limit($book->description, 50, '...') }}</td>
                                                <td>
                                                    @if ($book->is_borrowed)
                                                        <span class="badge bg-danger">Borrowed</span>
                                                    @else
                                                        <span class="badge bg-success">Available</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($student && !$student->membership)
                                                        <button class="btn btn-warning" disabled data-bs-toggle="tooltip" title="You need a membership to borrow books">
                                                            Membership Required
                                                        </button>
                                                    @elseif ($book->is_borrowed)
                                                        <button class="btn btn-secondary" disabled data-bs-toggle="tooltip" title="This book is already borrowed">
                                                            Borrowed
                                                        </button>
                                                    @else
                                                        <form action="{{ route('borrow.book', $book->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Borrow</button>
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
            
            <!-- Bootstrap Tooltip Activation -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                });
            </script>
            
        </div>
    </div>
@endsection
