@extends('dashboard.layouts.app')

@section('title', 'My Profile')

@section('breadcrumbs')
    <li class="breadcrumb-item active">My Profile</li>
@endsection

@section('content')
<div class="row gutters">
    <!-- Profile Info Form -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-title">Update Profile Information</div>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-dashboard::ui.input 
                        type="text" 
                        name="name" 
                        label="Full Name" 
                        :value="auth()->user()->name" 
                        required 
                    />

                    <x-dashboard::ui.input 
                        type="email" 
                        name="email" 
                        label="Email Address" 
                        :value="auth()->user()->email" 
                        required 
                    />

                    <div class="form-group mb-0 text-right">
                        <x-dashboard::ui.button type="submit" class="btn btn-primary" text="Save Changes" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Password Update Form -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-title">Update Password</div>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-dashboard::ui.input 
                        type="password" 
                        name="current_password" 
                        label="Current Password" 
                        required
                    />

                    <x-dashboard::ui.input 
                        type="password" 
                        name="password" 
                        label="New Password" 
                        required
                    />

                    <x-dashboard::ui.input 
                        type="password" 
                        name="password_confirmation" 
                        label="Confirm New Password" 
                        required
                    />

                    <div class="form-group mb-0 text-right">
                        <x-dashboard::ui.button type="submit" class="btn btn-primary" text="Change Password" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
