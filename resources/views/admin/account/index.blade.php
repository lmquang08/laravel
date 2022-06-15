@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Account')
@section('namePageHeading', 'Account')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary my-3" href="{{ route('admin.add.account') }}">Add Account</a>
        </div>
    </div>
    <div class="table-responsive my-5">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th class="text-center" colspan="2" width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($account as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>
                            <a href="{{ url('edit-account/'.$item->id) }} " class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('delete-account/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $account->links() }}

@endsection