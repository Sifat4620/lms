@extends('Dashboard.main.master')

    <body class="v-light compact-nav fix-header fix-sidebar">
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
            </div>
        </div>
        <div id="main-wrapper">
            <!-- header -->
            <div class="header">
                <div class="nav-header">
                
                    <div class="nav-control">
                        <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
                        </div>
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
                                                    <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="header-right">
                        <ul>
                            <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-bell f-s-18" aria-hidden="true"></i><div class="pulse-css"></div></a>
                                <div class="drop-down animated bounceInDown">
                                    <div class="dropdown-content-heading"><span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. Saifun</div>
                                                        <div class="notification-text">5 members joined today</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/2.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/3.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/4.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Ishrat Jahan</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center"><a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-comment f-s-18" aria-hidden="true"></i><div class="pulse-css"></div></a>
                                <div class="drop-down animated bounceInDown">
                                    <div class="dropdown-content-heading"><span class="text-left">2 New Messages</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Saiul Islam</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/2.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Ishrat Jahan</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/3.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Saiul Islam</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="../../assets/images/avatar/4.jpg" alt="">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Ishrat Jahan</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center"><a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="icons">
                                <a href="javascript:void(0)"> <i class="mdi mdi-crosshairs-gps f-s-18" aria-hidden="true"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="drop-down dropdown-task animated bounceInDown">
                                    <div class="dropdown-content-heading"><span class="text-left">Task Update</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">85% Complete</small>
                                                        <div class="notification-heading">Task One</div>
                                                        <div class="progress">
                                                            <div style="width: 85%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-success"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">60% Complete</small>
                                                        <div class="notification-heading">Task Two</div>
                                                        <div class="progress">
                                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-primary"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">25% Complete</small>
                                                        <div class="notification-heading">Task Three</div>
                                                        <div class="progress">
                                                            <div style="width: 25%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" role="progressbar" class="progress-bar progress-bar-warning"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="notification-content"><small class="notification-timestamp pull-right">75% Complete</small>
                                                        <div class="notification-heading">Task Four</div>
                                                        <div class="progress">
                                                            <div style="width: 75%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-danger"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center"><a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i></a>
                                <div class="drop-down dropdown-profile animated bounceInDown">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="#"><i class="mdi mdi-email"></i> <span>Inbox</span></a>
                                            </li>
                                            <li><a href="#"><i class="mdi mdi-settings"></i> <span>Setting</span></a>
                                            </li>
                                            <li><a href="#"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                            </li>
                                            <li><a href="#"><i class="icon-power"></i> <span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #/ header -->
            <!-- sidebar -->
            <div class="nk-sidebar">
                <div class="nk-nav-scroll">
                    <div class="nk-sidebar">
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                    
                        <li><a href="index.html"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                        </li>


                        <li class="nav-label">Components</li>
                        </li>  
                    
                        <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Form</span></a>
                            <ul aria-expanded="false">
                            
                                </li>
                                <li><a href="form-validation.html">Form Validation</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table-edit"></i> <span class="nav-text">Table</span></a>
                            <ul aria-expanded="false">
                                <li><a href="table-basic.html">Basic</a>
                                </li>
                            
                            </ul>
                        </li>
                        
                    
                        
                        <li><a href="page-invoice.html"><i class="mdi mdi-square-edit-outline"></i> <span class="nav-text">Invoice Summary</span></a>
                        </li>
                    </ul>
                </div>
                <!-- #/ nk nav scroll -->
            </div>
                </div>
                <!-- #/ nk nav scroll -->
            </div>
            <!-- #/ sidebar -->
            <!-- content body -->
            <div class="content-body">
                <div class="container">
                    <div class="row page-titles">
                        <div class="col p-0">
                            <h4>Hello, <span>Welcome here</span></h4>
                        </div>
                        <div class="col p-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">From</a>
                                </li>
                                <li class="breadcrumb-item active">Validation</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="#" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Books ID <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Books ID Auto Replace..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Books Name <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your Valid Book Name..">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-suggestions">Book Writter <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="About Your Book Writter"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Type <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="val-skill">
                                                        <option value="">Please select</option>
                                                        <option value="html">Horror</option>
                                                        <option value="css">Fantasy</option>
                                                        <option value="javascript">Fairy tales, fables, and folk tales</option>
                                                        <option value="angular">Drama</option>
                                                        <option value="angular">Fable</option>
                                                        <option value="vuejs">Romance</option>
                                                        <option value="ruby">Short Story</option>
                                                        <option value="php">Suspense and Thriller</option>
                                                        

                                                    </select>
                                                </div>
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #/ container -->
            </div>
            <!-- #/ content body -->
            <!-- footer -->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; <a href="#">Ameen</a> 2018</p>
                </div>
            </div>
            <!-- #/ footer -->
        </div>
        <!-- Common JS -->
        <script src="../../assets/plugins/common/common.min.js"></script>
        <!-- Custom script -->
        <script src="../js/custom+mini-nav.js"></script>
        <!-- Form Validation -->
        <script src="../../assets/plugins/validation/jquery.validate.min.js"></script>
        <script src="../../assets/plugins/validation/jquery.validate-init.js"></script>
    </body>

</html>