@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('companies.index') }}" class="list-group-item list-group-item-action">Manage Companies</a>
                    <a href="{{ route('employees.index') }}" class="list-group-item list-group-item-action">Manage Employees</a>
                </div>
            </div>
@endsection
