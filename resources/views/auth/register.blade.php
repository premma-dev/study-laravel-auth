<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo" />
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Register</h1>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="john doe" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="email@example.com" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="enter your password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="enter your confirm password" />
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input name="register" id="register" class="btn btn-block login-btn" type="submit"
                                value="Register" />
                        </form>
                        <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot password?</a>
                        <p class="login-wrapper-footer-text">
                            Account exist?
                            <a href="/login" class="text-reset">Login here</a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('images/login.jpg') }}" alt="login image" class="login-img" />
                    <p
                        class="
                                text-white
                                font-weight-medium
                                text-center
                                flex-grow
                                align-self-end
                                footer-link
                            ">
                        Free
                        <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">Bootstrap
                            dashboard templates</a>
                        from Bootstrapdash
                    </p>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
