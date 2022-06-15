@extends('admin.layout-admin')

@php
    $showHeading  = true;
    $buttonReport = false;
@endphp

@section('title', 'Tour')
@section('namePageHeading', 'Tours')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.add.tour') }}">Add Tour</a>
        </div>
    </div>
@endsection