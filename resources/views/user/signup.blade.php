@extends ('layout.master')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign Up</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('user.signup')}}" method="post">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
 @endsection