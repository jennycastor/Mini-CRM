@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $employee->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $employee->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $employee->phone }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $employee->company->name ?? 'N/A' }}</td>
            </tbody>
        </table>
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection
