<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Perusahaan</title>
    <link href="{{ url('admin_template/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-15">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">Register Perusahaan</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        @if (count($errors)>0)
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>×</span>
                                                </button>
                                                <h10><i class="icon fas fa-ban"></i><b> LOGIN ERROR!</b></h10>
                                                <br>
                                                @foreach ($errors->all() as $e)
                                                {{$e}}
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="name" :value="__('name')">Name</label><span class="mr-4 mb-3"
                                                style="color: red">*</span>
                                            <input id="name" class="form-control" type="name" name="name"
                                                placeholder="Enter Your Name" :value="old('name')" tabindex="1" required
                                                autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your username
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="form-group">
                                            <label for="email" :value="__('Email')">Email</label><span class="mr-4 mb-3"
                                                style="color: red">*</span>
                                            <input id="email" class="form-control" type="email" name="email"
                                                placeholder="Enter Your Email" :value="old('email')" tabindex="1"
                                                required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your username
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input id="password" class="form-control" type="password" name="password"
                                                placeholder="Enter Your Password" required
                                                autocomplete="current-password" required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="password_confirmation"
                                                :value="__('Confirm Password')">Password Confirmation</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" placeholder="Password Confirmation"
                                                required autocomplete="current-password" required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>

                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('login.admin') }}">
                                                {{ __('Already registered?') }}
                                            </a>

                                            <button type="submit" class="btn btn-primary" tabindex="4">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('welcome') }}">Back to Welcome Page!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; 2022 Bootcamp PT Setia Mandiri Perkasa </div>
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js">
    </script>
</body>

</html>
