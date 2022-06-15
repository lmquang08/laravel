@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add Customer')
@section('namePageHeading', 'Add Customer')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('admin/css/select2/select2.min.css') }}">
@endpush

@section('content')
<form action="{{ route('admin.handle.add.customer') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control form-control-user"
             name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control form-control-user"
             name="password">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control form-control-user"
             name="phone">
    </div>
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control form-control-user"
             name="fullname">
    </div>
    <div class="form-group">
        <label>Home Address</label>
        <input type="text" class="form-control form-control-user"
             name="home_address">
    </div>
    <div class="form-group">
        <label>Order Address</label>
        <input type="text" class="form-control form-control-user"
             name="order_address">
    </div>
    
    <div class="form-group">
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="0">Nu</option>
            <option value="1">Nam</option>
        </select>
    </div>
    <div class="form-group">
        <label>Birthday</label>
        <input type="date" class="form-control form-control-user"
             name="birthday">
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <input type="file" class="form-control form-control-user"
             name="avatar">
    </div>
    
    <button class="btn btn-primary" type="submit">Create Customer</button>
</form>
@endsection
@push('scripts')

@endpush