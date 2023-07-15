@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Company Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $company->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $company->email }}</td>
                </tr>
                <tr>
                    <th>Logo</th>
                    <td>
                        @if ($company->logo)
                        <img src="{{ asset('storage/company_logos/' . $company->logo) }}" alt="Company Logo" width="100" height="100">
                        @else
                            No logo
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ $company->website }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection
