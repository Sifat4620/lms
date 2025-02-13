<!-- resources/views/partials/header.blade.php -->
<div class="header">
    <div class="nav-header">
        <div class="nav-control">
            <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span></div>
        </div>
    </div>
    <div class="header-content">
        <div class="header-left">
            <ul>
                <li class="icons position-relative"><a href="javascript:void(0)"><i class="icon-magnifier f-s-16"></i></a>
                    <div class="drop-down animated bounceInDown">
                        <div class="dropdown-content-body">
                            <div class="header-search" id="header-search">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        {{-- <div class="header-right">
            <ul>
                <!-- Notification and Messages -->
                @include('partials.notifications')
                @include('partials.messages')
                @include('partials.tasks')
            </ul>
        </div> --}}
    </div>
</div>
