<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMAT - LOGIN</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-5 col-12">
        <div class="card shadow">
            <div class="card-body">
                <!-- Logo -->
                <div class="text-center mb-3">
                    <img src="{{ asset('portal-assets/img/logo.png') }}" alt="Logo" style="max-height: 80px;">
                    <h4 class="mt-2">LOGIN</h4>
                </div>

                <!-- Login Form -->
                <form class="form form-horizontal" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <!-- Email -->
                            <div class="col-12 mb-3">
                                <label for="email">Email</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-12 mb-3">
                                <label for="password">Password</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="col-12 mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12">
                                <!-- Tombol Login -->
                                <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>

                                <!-- Tombol Kembali -->
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100">Kembali</a>
                            </div>

                        </div>
                    </div>
                </form>

                <!-- Optional: Forgot password -->
                <div class="text-center mt-3">
                    <a href="#">Lupa Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif

    @if (session('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif
</script>

</body>

</html>