@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Member Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-primary">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <p class="card-text">{{ Auth::user()->email }}</p>
                    <a href="{{ route('member.profile') }}" class="btn btn-light btn-sm">View Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-success">
                <div class="card-header">My Activities</div>
                <div class="card-body">
                    <p class="card-text">Check your recent activities and participation.</p>
                    <a href="{{ route('member.activities') }}" class="btn btn-light btn-sm">View Activities</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-info">
                <div class="card-header">Notifications</div>
                <div class="card-body">
                    <p class="card-text">You have {{ $notificationsCount ?? 0 }} new notifications.</p>
                    <a href="{{ route('member.notifications') }}" class="btn btn-light btn-sm">View Notifications</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
