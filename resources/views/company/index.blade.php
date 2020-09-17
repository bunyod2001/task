@extends('layouts.app')



@section('content')

    <div class="container">


            <div class="row mb-2" >
                <div class="col-lg-6">
                    <a href="{{ route('staff.index') }}" class="btn btn-primary btn-lg"> List Staff</a>

                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">
                    <a href="{{  route('company.create') }}" class="btn btn-outline-light btn-lg float-right mb-2">+ Add New Company</a>
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
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($company as $index)
                    <tr>
                        <td>{{ $index->id }}</td>
                        <td>
                            <img src="{{ url('image',$index->image) }}" alt="..." id="indeximg" class="rounded-circle">
                        </td>
                        <td>{{ ($index->name) }}</td>
                        <td>{{ $index->email }}</td>
                        <td>{{ $index->website }}</td>
                        <td>
                            <a href="{{ route('company.show', $index->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Show</a>
                        </td>
                        <td>
                            <a href="{{ route('company.edit', $index->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('company.destroy', $index->id) }}" method="POST">
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
            {{ $company->links() }}
    </div>

    </div>
@endsection
