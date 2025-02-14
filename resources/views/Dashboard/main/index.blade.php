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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Books <span class="pull-right"><i class="ion-android-download f-s-30 text-primary"></i></span></h4>
                        <h6 class="m-t-20 f-s-14">50% Complete</h6>
                        <div class="progress m-t-0 h-7px">
                            <div role="progressbar" class="progress-bar bg-primary wow animated progress-animated w-50pc h-7px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Borrow Books <span class="pull-right"><i class="ion-android-upload f-s-30 text-success"></i></span></h4>
                        <h6 class="m-t-20 f-s-14">90% Complete</h6>
                        <div class="progress m-t-0 h-7px">
                            <div role="progressbar" class="progress-bar bg-danger wow animated progress-animated w-90pc h-7px"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>In Stocks Books <span class="pull-right"><i class="ion-android-list f-s-30 text-danger"></i></span></h4>
                        <h6 class="m-t-20 f-s-14">65% Checked</h6>
                        <div class="progress m-t-0 h-7px">
                            <div role="progressbar" class="progress-bar bg-success wow animated progress-animated w-65pc h-7px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
