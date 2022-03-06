<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid ml-5">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo_baru.png') }}" alt=""> 
           
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Dashboard</a>
                </li>
                @auth
                    @if (Auth::user()->role == 'User' || Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('program-kelas.index') }}">Program Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Flash Sale  <span class="badge badge-xs badge-secondary">New</span></a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'Perusahaan' || Auth::user()->role == 'User' || Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="#">Portofolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('community.index') }}">Community</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('program-kelas.index') }}">Program Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Flash Sale  <span class="badge badge-xs badge-secondary">New</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('community.index') }}">Community</a>
                    </li>

                @endauth
            </ul>

            @auth
            <div class="d-flex user-logged nav-item dropdown no-arrow">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Halo, {{Auth::user()->name}}!
                    @if (Auth::user()->role == 'Perusahaan' || Auth::user()->role == 'Mentor')
                        <img src="{{url('perusahaan/logo/'.Auth::user()->avatar)}}" class="user-photo" alt="" style="border-radius: 50%">
                    @else
                    @if (Auth::user()->avatar)
                        <img src="{{Auth::user()->avatar}}" class="user-photo" alt="" style="border-radius: 50%">
                    @else
                        <img src="https://ui-avatars.com/api/?name=Admin" class="user-photo" alt="" style="border-radius: 50%">
                    @endif
                    @endif
                   
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto">
                        <li>
                            @if (Auth::user()->role == 'User')
                                <a href="{{route('user.dashboard')}}" class="dropdown-item">My Dashboard</a>
                            @elseif (Auth::user()->role == 'Perusahaan')
                                <a href="{{route('perusahaan.dashboard')}}" class="dropdown-item">My Dashboard</a>
                            @elseif (Auth::user()->role == 'Admin')
                                <a href="{{route('perusahaan.dashboard')}}" class="dropdown-item">My Dashboard</a>
                            @elseif (Auth::user()->role == 'Mentor')
                                <a href="{{route('mentor.dashboard')}}" class="dropdown-item">My Dashboard</a>
                            @endif
                         
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </li>
                    </ul>
                </a>
            </div>
            @else
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-master btn-secondary me-3">
                    Sign In
                </a>
                <a href="{{ route('login') }}" class="btn btn-master btn-primary">
                    Sign Up
                </a>
            </div>
            @endauth

        </div>
    </div>
</nav>


