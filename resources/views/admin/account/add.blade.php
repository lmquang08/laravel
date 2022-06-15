@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add Account')
@section('namePageHeading', 'Add Account')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('admin/css/select2/select2.min.css') }}">
@endpush

@section('content')
<form action="{{ route('admin.handle.add.account') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control form-control-user"
             name="username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control form-control-user"
             name="password">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control form-control-user"
             name="email">
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
        <label>Address</label>
        <input type="text" class="form-control form-control-user"
             name="address">
    </div>
    <div class="form-group">
        <label>Birthday</label>
        <input type="date" class="form-control form-control-user"
             name="birthday">
    </div>
    <div class="form-group">
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="0">Nu</option>
            <option value="1">Nam</option>

        </select>
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <input type="file" class="form-control form-control-user"
             name="avatar">
    </div>
    <div class="form-group">
        <label>Roles</label>
        <select class="js-multiple-roles js-example-basic-single form-control form-control-user" name="role[]" multiple="multiple">
            @foreach($roles as $role)
                <option value="{{ $role -> id }}">{{ $role -> name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Create Account</button>
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