@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add Role')
@section('namePageHeading', 'Add Role')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.roles') }}">List role</a>
            <form>
                {{-- form crear role --}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                {{-- list permissions --}}
                <hr/>
                @foreach ($permission as $item)
                    <div class="row">
                        <div class="col">
                            <p>
                                <input type="checkbox" name="" />
                                <span>{{ $item->name }}</span>
                            </p>
                        </div>
                    </div>  
                @endforeach
                <hr/>
                <button class="btn btn-primary" type="button"> Add </button>
            </form>
        </div>
    </div>
@endsection