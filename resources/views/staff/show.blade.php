@extends('layouts.app')



@section('content')

    <div class="jumbotron bg-dark text-center">

        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('staff.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-9">
                <h3 class="bg-light p-3"> Welcome to Worker data! </h3>
            </div>
        </div>
        <h2 class="text-white">Name is : {{ $staff->name }} </h2>
        <h2 class="text-white">Surname is : {{ $staff->surname }} </h2>
        <h2 class="text-white">Email is : {{ $staff->email }}</h2>
        <h2 class="text-white">Company is : {{ $staff->company->name }}</h2>
        <h2 class="text-white">Phone is : {{ $staff->phone }}</h2>
    </div>

@endsection
</div>
