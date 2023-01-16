@extends('template')

@section('content')
<div style="height: 82vh">
    <div style="width: 40%; height: 50%; margin:0 auto; padding-top:50px;">
        <form action="/register" method="POST">
            @csrf
            <h1 style="color: purple">Register Form</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="name" aria-describedby="emailHelp">
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="email" name="password" aria-describedby="emailHelp">
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password" name="password_confirmation">
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <button type="submit" class="btn btn-primary">Register Now</button>
        </form>
    </div>
</div>
@endsection
