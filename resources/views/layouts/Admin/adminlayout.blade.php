<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bootcamp Admin</title>
    <link href="{{ url('admin_template/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/logo_baru.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ asset('images/logo_baru.png') }} />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url('/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-embed-styles />

</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <i class="fas fa-user-cog mr-3"></i>
            @if (Auth::user()->role == 'Admin')
                Sistem Admin Bootcamp
            @elseif (Auth::user()->role == 'Mentor')
                Sistem Mentor Bootcamp
            @elseif (Auth::user()->role == 'Perusahaan')
                Perusahaan Kerjasama
            @endif
           
        </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2 ml-3" id="sidebarToggle" href="#"><i
                data-feather="menu"></i></button>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                @if (Auth::user()->avatar)
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid" src="{{Auth::user()->avatar}}" />
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="{{Auth::user()->avatar}}" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
                            <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                        </div>
                    </h6>
                    @else
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><img class="img-fluid" src="https://ui-avatars.com/api/?name=Admin" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="https://ui-avatars.com/api/?name=Admin" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
                                <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                            </div>
                        </h6>
                        @endif


                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('welcome') }}">
                            <div class="dropdown-item-icon"><i data-feather="columns"></i></div>
                            Welcome Page
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
            </li>
        </ul>
    </nav>

    {{-- SIDE BAR --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">

                        @if (Auth::user()->role == 'Perusahaan')
                        <div class="sidenav-menu-heading">Profile</div>
                        <a class="nav-link" href="{{ route('perusahaan.dashboard')}}">
                            <div class="nav-link-icon"><i class="fas fa-building"></i></div>
                            Profile
                        </a>
                        <div class="sidenav-menu-heading">Atur Lowongan</div>
                        <a class="nav-link" href="{{ route('pengumuman.index')}}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Pengumuman
                        </a>
                        <a class="nav-link" href="{{ route('dashboard')}}">
                            <div class="nav-link-icon"><i class="fas fa-address-card"></i></div>
                            Calon Pelamar
                        </a>
                        @endif


                        @if (Auth::user()->role == 'Admin' && Auth::user()->role == 'Mentor')
                        <div class="sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="{{ route('dashboard')}}">
                            <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Dashboard
                        </a>
                        @endif
                       

                        @if (Auth::user()->role == 'Admin')
                            <div class="sidenav-menu-heading">Master Data</div>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                                Master Data
                                <div class="sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                    <a class="nav-link" href="{{ route('kelas.index') }}">
                                        Kelas
                                    </a>
                                    <a class="nav-link" href="{{ route('jenis-kelas.index') }}">
                                        Jenis Kelas
                                    </a>
                                    <a class="nav-link" href="{{ route('level.index') }}">
                                        Level
                                    </a>
                                    <a class="nav-link" href="{{ route('diskon.index') }}">
                                        Diskon
                                    </a>
                                </nav>
                            </div>

                            <div class="sidenav-menu-heading">Detail Kelas</div>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                                <div class="nav-link-icon">
                                    <i class="fas fa-cubes"></i>
                                </div>
                                User dan Pembayaran
                                <div class="sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav" style="">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('list-user.index') }}">
                                        List User
                                    </a>
                                    <a class="nav-link" href="{{ route('list-checkout.index') }}">
                                        List Pembayaran
                                    </a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Capaian User
                                <div class="sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapsePages" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link " href="#">
                                        Sertifikat
                                    </a>
                                    <a class="nav-link " href="#">
                                        Review Kelas
                                    </a>
                                    <a class="nav-link " href="#">
                                        Portofolio
                                    </a>
                                </nav>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'Admin')
                        <div class="sidenav-menu-heading">Mentor</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="nav-link-icon"><i class="fas fa-address-card"></i></div>
                            Mentor Menu
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down">
                                </i></div>
                        </a>
                        @endif
                     

                        <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                @if (Auth::user()->role == 'Admin')
                                    <a class="nav-link" href="{{ route('list-mentor.index') }}">
                                        List Mentor
                                    </a>
                                @endif
                                @if (Auth::user()->role == 'Mentor')
                                    <a class="nav-link" href="{{ route('mentor-kelas.index') }}">
                                        Modul Kelas
                                    </a>
                                    <a class="nav-link" href="{{ route('mentor-video.index') }}">
                                        Video Mentor
                                    </a>
                                @endif
                               
                                @if (Auth::user()->role == 'Admin')
                                    <a class="nav-link" href="{{ route('approval-video.index') }}">
                                        Approval Video Mentor
                                    </a>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- USER ROLE Side Bar --}}
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Jabatan :</div>
                        <div class="sidenav-footer-title">{{ Auth::user()->role }}</div>
                    </div>
                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">
            @include('sweetalert::alert')
            @yield('content')
            <footer class="footer mt-auto footer-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">Copyright &copy; 2021 Bootcamp PT Setia Mandiri Perkasa.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/admin_template/dist/js/scripts.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/admin_template/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/admin_template/dist/assets/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


</body>

</html>
