@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Edit Account')
@section('namePageHeading', 'Edit Account')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('admin/css/select2/select2.min.css') }}">
@endpush

@section('content')
<form action="{{ url('update-account/'.$account->id) }}" method="post" encrypted="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control form-control-user"
             name="username" value="{{ $account->username }}">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control form-control-user"
             name="password" value="{{ $account->password }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control form-control-user"
             name="email" value="{{ $account->email }}">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control form-control-user"
             name="phone" value="{{ $account->phone }}">
    </div>
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control form-control-user"
             name="fullname" value="{{ $account->fullname }}">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control form-control-user"
             name="address" value="{{ $account->address }}">
    </div>
    <div class="form-group">
        <label>Birthday</label>
        <input type="date" class="form-control form-control-user"
             name="birthday" value="{{ $account->birthday }}">
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <input type="file" class="form-control form-control-user"
             name="avatar" value="{{ $account->avatar }}">
    </div>
    
    <button class="btn btn-primary" type="submit">Edit Account</button>
</form>
@endsection
@push('scripts')
<script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.js-multiple-roles').select2();
    });
</script>
@endpush