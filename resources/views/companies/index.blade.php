@extends('layouts.app')



@section('content')
    <div class="container">
        <b><h1>Companies</h1></b>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3 mt-3">Create Company</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td><img src="{{ asset('storage/company_logos/' . $company->logo) }}" alt="Company Logo" width="100" height="100"></td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-m">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary btn-m">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-m" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection
