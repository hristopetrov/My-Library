<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('homepage')}}">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-book" aria-hidden="true"></i> My Library<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                         <li><a href="{{route('library.library')}}">View Library</a></li>
                        <li><a href="{{route('library.create')}}">Create book</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{route('user.profile')}}" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                            @if (Auth::guest())
                                User Management
                            @else
                                {{ Auth::user()->username }}
                            @endif
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{route('user.profile')}}">User Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.logout')}}">Logout</a></li>
                        @else
                           <li><a href="{{route('user.signup')}}">Sign up</a></li>
                            <li><a href="{{route('user.signin')}}">Sign in</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>