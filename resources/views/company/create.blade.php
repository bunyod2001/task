@extends('layouts.app')



@section('content')
    <div class="container" >
        <a href="{{ route('company.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
        <br><br>

        {{-- error bag sms --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        {{-- end error --}}

        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name :</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="">Email :</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="">Website :</label>
                <input type="text" name="website" class="form-control" placeholder="Enter your Website" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="">Image :</label>
                <input type="file" name="image" class="form-control">
            </div>
            <input type="submit" class="btn btn-info btn-lg" value="OK">
        </form>

    </div>

@endsection
