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
                                <div class="col-lg-4">
                                    <h5>Student ID: {{ $student->username }}</h5>
                                    <p><strong>Name:</strong> {{ $student->name }}</p>
                                    <p><strong>Email:</strong> {{ $student->email }}</p>
                            
                                    {{-- Membership Section --}}
                                    <h6>Membership:</h6>
                                    @if ($student->membership)
                                        <p><strong>Plan:</strong> {{ $student->membership->name }}</p>
                            
                                        {{-- Extra Fee code --}}
                                        @php
                                            // Initialize fine amount
                                            $fineAmount = 0;
                                            // Get all borrowed books by the student
                                            $borrowedBooks = $student->borrowedBooks;
                                            // Loop through borrowed books to check for overdue fines
                                            foreach ($borrowedBooks as $book) {
                                                if ($book->pivot->due_date && \Carbon\Carbon::parse($book->pivot->due_date)->isPast()) {
                                                    $daysOverdue = \Carbon\Carbon::parse($book->pivot->due_date)->diffInDays(now());
                                                    $fineAmount += $daysOverdue * 50; // 50 Tk fine per day
                                                }
                                            }
                                            // Total Fee (Membership Fee + Fine)
                                            $totalFee = $student->membership->price + $fineAmount;
                                        @endphp
                            
                                        <p><strong>Membership Fee:</strong> {{ $student->membership->price }} Tk</p>
                                        @if ($fineAmount > 0)
                                            <p class="text-danger"><strong>Overdue Fine:</strong> {{ $fineAmount }} Tk</p>
                                        @endif
                                        <p><strong>Total Payable:</strong> {{ $totalFee }} Tk</p>
                                        <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($student->membership->start_date)->addMonth()->diffForHumans() }}</p>
                                        <p><strong>Features:</strong></p>
                                        <ul>
                                            @foreach (json_decode($student->membership->features) as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-danger"><strong>No Membership Assigned</strong></p>
                                        <button type="button" class="btn btn-primary" onclick="showUpgradePopup()">Upgrade Membership</button>
                                    @endif
                            
                                    <h6>Wallet Balance: {{ $student->balance }} Tk</h6>
                                    <form action="{{ route('wallet.deposit') }}" method="POST">
                                        @csrf
                                        <input type="number" name="amount" placeholder="Enter amount" required class="form-control">
                                        <button type="submit" class="btn btn-success mt-2">Deposit Money</button>
                                    </form>
                            
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
                                    <h5>Borrowed Books</h5>
                                   {{-- Borrow and fine section --}}
                                   <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Borrowed On</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Fine</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrowedBooks as $book)
                                            @php
                                                $borrowedDate = \Carbon\Carbon::parse($book->pivot->borrowed_at);
                                                $dueDate = $borrowedDate->copy()->addDays(15); // Correctly set due date
                                                $today = now();
                                                $isOverdue = $today->greaterThan($dueDate);
                                                $daysOverdue = $isOverdue ? $dueDate->diffInDays($today) : 0;
                                                $fineAmount = $daysOverdue * 50;
                                            @endphp
                                            <tr>
                                                <td>{{ $book->name }}</td>
                                                <td>{{ $borrowedDate->format('d-m-Y') }}</td>
                                                <td>{{ $dueDate->format('d-m-Y') }}</td>
                                                <td>
                                                    @if ($isOverdue)
                                                        <span class="badge bg-danger">Overdue ({{ $daysOverdue }} days)</span>
                                                    @else
                                                        <span class="badge bg-success">On Time ({{ $dueDate->diffInDays($today) }} days left)</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($isOverdue)
                                                        <span class="text-danger">{{ number_format($fineAmount, 2) }} Tk</span>
                                                    @else
                                                        <span class="text-success">No Fine</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('books.return', $book->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            {{ $isOverdue ? 'Pay Fine' : 'Return' }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    
                                   {{-- Borrow and fine section --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showUpgradePopup() {
        Swal.fire({
            title: 'Upgrade Membership',
            text: 'Are you sure you want to upgrade your membership?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes, Upgrade',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Select Membership',
                    input: 'select',
                    inputOptions: {
                        @foreach ($memberships as $membership)
                            {{ $membership->id }}: '{{ $membership->name }} - {{ $membership->price }} Tk',
                        @endforeach
                    },
                    inputPlaceholder: 'Choose a plan',
                    showCancelButton: true,
                    confirmButtonText: 'Upgrade Now',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let membershipId = result.value;
                        let membershipPrice = @json($memberships->pluck('price', 'id'))[membershipId];
                        let userBalance = {{ $student->balance }};
                        
                        if (userBalance >= membershipPrice) {
                            let form = document.createElement('form');
                            form.method = 'POST';
                            form.action = "{{ route('upgrade.post') }}";
                            form.innerHTML = `
                                @csrf
                                <input type="hidden" name="membership_id" value="${membershipId}">
                            `;
                            document.body.appendChild(form);
                            form.submit();
                        } else {
                            Swal.fire({
                                title: 'Insufficient Balance',
                                text: 'You need to deposit more money to upgrade your membership.',
                                icon: 'warning',
                                confirmButtonText: 'Deposit Now'
                            }).then(() => {
                                document.querySelector('[name="amount"]').focus();
                            });
                        }
                    }
                });
            }
        });
    }
</script>