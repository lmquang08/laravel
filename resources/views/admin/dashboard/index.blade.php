@extends('admin.layout-admin')

@php
    $showHeading  = true;
    $buttonReport = true;
@endphp

@section('namePageHeading', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <h3> session :  {{ $user }}</h3>
        </div>
    </div>
@endsection