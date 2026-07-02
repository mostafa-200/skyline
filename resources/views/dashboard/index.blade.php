@extends('dashboard.layouts.app')

@section('title', 'Admin Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Welcome to CCESS CMS, {{ auth()->user()->name }}!</h4>
                <p class="text-muted">This is your session-protected dashboard management console.</p>
            </div>
        </div>
    </div>
</div>

<div class="row gutters">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="info-stats4 mb-4">
            <div class="info-icon">
                <i class="icon-user1"></i>
            </div>
            <div class="sale-num">
                <h3>1</h3>
                <p>Dashboard Users</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="info-stats4 mb-4">
            <div class="info-icon">
                <i class="icon-file-text"></i>
            </div>
            <div class="sale-num">
                <h3>0</h3>
                <p>Total Pages</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="info-stats4 mb-4">
            <div class="info-icon">
                <i class="icon-settings1"></i>
            </div>
            <div class="sale-num">
                <h3>Active</h3>
                <p>System Configuration</p>
            </div>
        </div>
    </div>
</div>
@endsection
