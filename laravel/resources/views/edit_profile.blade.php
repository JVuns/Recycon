@extends('template')

@section('content')
    <div style="height: 82vh">
        <div style="width: 40%; height: 50%; margin:0 auto; padding-top:50px;">
            <form action="/edit-profile" method="POST">
                @csrf
                <h1 style="color: purple">Edit Profile</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="{{ Auth::user()->name }}" type="name" class="form-control" id="name" name="name"
                        aria-describedby="emailHelp">
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" value={{ Auth::user()->email }}>Email</label>
                    <input value="{{ Auth::user()->email }}" type="email" class="form-control" id="email"
                        name="email">
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
