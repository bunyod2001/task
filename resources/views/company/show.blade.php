@extends('layouts.app')



@section('content')
    <div class="jumbotron bg-dark text-center">

        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('company.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-9">
                <h3 class="bg-light p-3"> Welcome to company data! </h3>
            </div>
        </div>
        <img src="{{ url('image', $company->image) }}" alt="..." id="showimg" class="rounded-circle">
        <h2 class="text-white">Name is : {{ $company->name }} </h2>
        <h2 class="text-white">Email is : {{ $company->email }}</h2>
        <h2 class="text-white">Website is : {{ $company->website }}</h2>
    </div>

@endsection
