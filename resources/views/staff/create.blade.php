@extends('layouts.app')



@section('content')
    <div class="container" >
        <a href="{{ route('staff.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
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

        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name :</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="">Surname :</label>
                <input type="text" name="surname" class="form-control" placeholder="Enter your surname" value="{{ old('surname') }}">
            </div>
            <div class="form-group">
                <label for="">Email :</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="">Phone :</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter your Phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="company_id">Company :</label>
               <select name="company_id" id="company_id" class="form-control">
                   @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                   @endforeach
               </select>
            </div>
            <input type="submit" class="btn btn-info btn-lg" value="OK">
        </form>

    </div>

@endsection
