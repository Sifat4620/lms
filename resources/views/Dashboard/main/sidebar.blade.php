<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('index') }}"><i class="mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a></li>
            <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Form</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('book.form') }}">Book Form</a></li>
                </ul>
            </li>
            <li class="has-arrow"><a href="#"><i class="mdi mdi-table-edit"></i> <span class="nav-text">Table</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('book.form') }}">Books</a></li>
                    <li><a href="{{ route('students.index') }}">Students</a></li>
                    <li><a href="{{ route('report.index') }}">Report</a></li>
                </ul>
            </li>
            {{-- <li><a href="{{ route('invoice') }}"><i class="mdi mdi-square-edit-outline"></i> <span class="nav-text">Invoice Summary</span></a></li> --}}
        </ul>
    </div>
</div>
