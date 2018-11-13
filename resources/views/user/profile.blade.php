@extends ('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1>User Profile</h1>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
        <form action="{{ route('user.edit', $user->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname')? old('firstname') : $user->firstname }}" >
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname')? old('lastname') : $user->lastname }}" >
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username')? old('username') : $user->username }}" >
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email')? old('email') : $user->email }}" >
            </div>
            <button type="submit" class="btn btn-primary">Edit Profile</button>
            {{csrf_field()}}
        </form>
        </div>
    </div>
@endsection