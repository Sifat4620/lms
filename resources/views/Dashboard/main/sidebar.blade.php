<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <!-- Dashboard -->
            <li><a href="{{ route('index') }}">
                <i class="mdi mdi-view-dashboard"></i> 
                <span class="nav-text">Dashboard</span>
            </a></li>

            <!-- Form Section -->
            <li class="has-arrow">
                <a href="#" aria-expanded="false">
                    <i class="mdi mdi-nfc-variant"></i>
                    <span class="nav-text">Form</span>
                </a>
                <ul aria-expanded="false">
                    <!-- Book Form (Check if the user has permission to manage books) -->
                    @can('manage books')
                        <li><a href="{{ route('book.form') }}">Book Form</a></li>
                    @endcan
                </ul>
            </li>

            <!-- Table Section -->
            <li class="has-arrow">
                <a href="#">
                    <i class="mdi mdi-table-edit"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <!-- Books Table (Check if the user has permission to manage books) -->
                    @can('manage books')
                        <li><a href="{{ route('books.index') }}">Books</a></li>
                    @endcan
                    
                    <!-- Students Table (Check if the user has permission to manage students) -->
                    @can('manage students')
                        <li><a href="{{ route('students.index') }}">Students</a></li>
                    @endcan
                    
                    <!-- Report Table (Check if the user has permission to view reports) -->
                    @can('view reports')
                        <li><a href="{{ route('report.index') }}">Report</a></li>
                    @endcan
                </ul>
            </li>

            <!-- Student Profile Link (Always available for students) -->
            @can('borrow books')
                <li>
                    <a href="{{ route('student.profile') }}">
                        <i class="mdi mdi-account-circle"></i> 
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
            @endcan

            <!-- Invoice Section (commented out) -->
            {{-- 
            <li>
                <a href="{{ route('invoice') }}">
                    <i class="mdi mdi-square-edit-outline"></i>
                    <span class="nav-text">Invoice Summary</span>
                </a>
            </li>
            --}}
        </ul>
    </div>
</div>
