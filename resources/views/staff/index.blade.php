@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row mb-2" >
            <div class="col-lg-6">
                <a href="{{ route('company.index') }}" class="btn btn-primary btn-lg"> List Company</a>

            </div>
            <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
                <a href="{{  route('staff.create') }}" class="btn btn-outline-light btn-lg float-right">+ Add New Staff</a>
            </div>
        </div>




        {{-- flash sms --}}

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        {{-- end --}}

    {{-- this is table portion --}}

        <table class="table table-bordered text-white bg-dark mt-3">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $index)
                    <tr>
                        <td>{{ $index->id }}</td>
                        <td>{{ ($index->name) }}</td>
                        <td>{{ $index->surname }}</td>
                        <td>{{ $index->email }}</td>
                        {{-- <td>{{ $index->company_id }}</td> --}}
                        <td>@if(!empty($index->company)) {{ $index->company->name }} @endif</td>
                        <td>{{ $index->phone }}</td>
                        <td>
                            <a href="{{ route('staff.show', $index->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Show</a>
                        </td>
                        <td>
                            <a href="{{ route('staff.edit', $index->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('staff.destroy', $index->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>

        </table>
    {{-- end table --}}

    <div class="d-flex justify-content-center align-items-center">
            {{ $staff->links() }}
    </div>

    </div>
@endsection
