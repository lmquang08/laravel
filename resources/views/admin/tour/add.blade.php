@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add Tour')
@section('namePageHeading', 'Add Tour')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary mb-3" href="{{ route('admin.tour') }}">List Tour</a>
            <div class="alert alert-danger my-3" style="display:none">
            </div>
            <form class="my-3" action="{{ route('admin.handle.add.tour') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- form crear role --}}
                <div class="form-group">
                    <label>Name</label>
                    <input id="nameRole" type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control form-control-user"
                         name="start_date">
                </div>
                <div class="form-group">
                    <label>Tour Date</label>
                    <input type="text" class="form-control form-control-user"
                         name="tour_date">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control form-control-user"
                         name="start_address">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control form-control-user"
                        name="image">
                </div>
                <div class="form-group">
                    <label>Transport</label>
                    <input type="text" class="form-control form-control-user"
                         name="transport">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control form-control-user"
                         name="price">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control form-control-user"
                         name="	description">
                </div>
                
                <hr>
                <button class="btn btn-primary " type="submit"> Add </button>
                
            </form>
        </div>
    </div>
@endsection