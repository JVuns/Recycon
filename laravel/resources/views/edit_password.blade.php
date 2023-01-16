@extends('template')

@section('content')
    <div style="height: 82vh">
        <div style="width: 40%; height: 50%; margin:0 auto; padding-top:50px;">
            <form action="/edit-password" method="POST">
                @csrf
                <h1 style="color: purple">Edit Profile</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                    <small class="text-danger">{{ $errors->first('password') }}</small>                        
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" value="">New Password</label>
                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                    <small class="text-danger">{{ $errors->first('newpassword') }}</small>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" value="">Confirm New Password</label>
                    <input type="password" class="form-control" id="newpassword_confirmed" name="newpassword_confirmation">
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
