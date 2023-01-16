@extends('template')

@section('content')
<div style="height: 82vh">
    <div style="width: 40%; height: 50%; margin:0 auto; padding-top:50px;">
        <form action="/loging" method="POST">
            @csrf
            <h1 style="color: purple">Please Sign In</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" value={{ old('email') }} class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" value={{ old('password') }}>Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="exampleCheck1" checked="{{Cookie::get('cookie') !== null}}" >Remember</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
