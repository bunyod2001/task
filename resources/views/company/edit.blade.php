@extends('layouts.app')



@section('content')
    <div class="container" >
        <a href="{{ route('company.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>


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

        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('company.update', $company->id)  }}"
                     method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name :</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ $company->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{ $company->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Website :</label>
                        <input type="text" name="website" class="form-control" placeholder="Enter your website" value="{{ $company->website }}">
                    </div>
                    <div class="form-group">
                        <label for="">Upload image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="from-group">
                        <input type="hidden" name="my_image" value="{{ $company->image }}">
                    </div>

                    <input type="submit" class="btn btn-info btn-lg" value="OK">
                </form>

            </div>



            <div class="col-lg-6 bg-dark">
                <div class="d-flex justify-content-center">
                    <div>
                        <h2 class="text-center text-white"> Picture</h2>
                        <img src="{{ url('image/', $company->image) }}" alt="..."
                        id="editimg" class="rounded">
                    </div>
                </div>
            </div>
        </div>





    </div>


@endsection
