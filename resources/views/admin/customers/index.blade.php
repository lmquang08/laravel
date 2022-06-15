@extends('admin.layout-admin')

@php
    $showHeading  = true;
    $buttonReport = false;
@endphp

@section('title', 'Customers')
@section('namePageHeading', 'Customers')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.add.customer') }}">Add Customers</a>
        </div>
    </div>
@endsection