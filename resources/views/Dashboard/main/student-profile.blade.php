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



                                    {{-- Membership Section --}}

                                    <h6>Membership:</h6>
                                    @if ($student->membership)
                                        <p><strong>Plan:</strong> {{ $student->membership->name }}</p>
                                        <p><strong>Fee:</strong> {{ $student->membership->price }} Tk</p>
                                        <p><strong>Features:</strong></p>
                                        <ul>
                                            @foreach (json_decode($student->membership->features) as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-danger"><strong>No Membership Assigned</strong></p>
                                        
                                        <!-- Upgrade Membership Button -->
                                        <button type="button" class="btn btn-primary" onclick="showUpgradePopup()">
                                            Upgrade Membership
                                        </button>
                                    @endif
                                    
                                    <!-- SweetAlert JavaScript -->
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
                                                            if (membershipId) {
                                                                // Send the form request
                                                                let form = document.createElement('form');
                                                                form.method = 'POST';
                                                                form.action = "{{ route('upgrade.post') }}";
                                                                form.innerHTML = `
                                                                    @csrf
                                                                    <input type="hidden" name="membership_id" value="${membershipId}">
                                                                `;
                                                                document.body.appendChild(form);
                                                                form.submit();
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    </script>
                                    
                                    <!-- Include SweetAlert -->
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                                    {{-- Membership Section --}}
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
                                    <table class="table table-striped">
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
