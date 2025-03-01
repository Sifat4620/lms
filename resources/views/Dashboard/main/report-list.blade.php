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

        <!-- Filtering Form -->
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('report.index') }}" method="GET" class="mb-4">
                    <div class="form-group row">
                        <label for="borrow_date" class="col-form-label col-sm-2">Borrow Date:</label>
                        <div class="col-sm-3">
                            <input type="date" id="borrow_date" name="borrow_date" class="form-control" value="{{ request('borrow_date') }}">
                        </div>
                        <label for="status" class="col-form-label col-sm-2">Status:</label>
                        <div class="col-sm-3">
                            <select id="status" name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="need_to_order"{{ request('status') == 'need_to_order' ? ' selected' : '' }}>Need to Order</option>
                                <option value="borrowed"{{ request('status') == 'borrowed' ? ' selected' : '' }}>Borrowed</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
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
                                    @foreach ($borrowedBooks as $index => $borrowedBook)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $borrowedBook->book->name }}</td>
                                            <td>{{ $borrowedBook->user->id }}</td>
                                            <td>BG-{{ str_pad($borrowedBook->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td>
                                                @if (now()->greaterThan($borrowedBook->due_date))
                                                    <span class="badge badge-danger">Overdue</span>
                                                @elseif ($borrowedBook->borrowed_at)
                                                    <span class="badge badge-primary">Borrowed</span>
                                                @else
                                                    <span class="badge badge-success">Returned</span>
                                                @endif
                                            </td>
                                            <td>{{ $borrowedBook->borrowed_at->format('Y-m-d') }}</td>
                                            <td>{{ $borrowedBook->due_date->format('Y-m-d') }}</td>
                                            <td>
                                                @if (now()->greaterThan($borrowedBook->due_date))
                                                    <span class="badge badge-danger">Urgent Order</span>
                                                @elseif ($borrowedBook->borrowed_at)
                                                    <span class="badge badge-warning">Need to Order</span>
                                                @else
                                                    <span class="badge badge-secondary">No Action</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Borrowed Books -->
                        <div class="mt-4">
                            <h5>Total Borrowed Books: {{ $borrowedBooks->count() }}</h5>
                            <p>Total Books that Need to be Ordered: 
                                {{ $borrowedBooks->filter(function ($book) {
                                    return $book->borrowed_at != null && $book->return_date == null; // Assumes return_date is null if not returned
                                })->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
