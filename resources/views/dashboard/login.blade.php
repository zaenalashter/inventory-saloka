<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.app_name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
{{--        <i class="fas fa-city"></i>--}}
        <img src="{{ asset('home/images/logoSaloka.png') }}" class="img-fluid" ref="company logo" >
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>Login Human Resources Information System Saloka</b></p>

            <form id="formLogin">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button id="btnSubmit" type="submit" class="btn btn-primary btn-block btn-flat">
                            <i id="infoBtnSubmit" class="far fa-circle"></i> Login
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let formLogin = $('#formLogin');

    const infoBtnSubmit = $('#infoBtnSubmit');

    const iconSuccess = 'far fa-circle';
    const iconFailed = 'fas fa-times';

    formLogin.submit(function (e) {
        e.preventDefault();
        infoBtnSubmit.attr('class','fas fa-spinner fa-pulse');
        $.ajax({
            url: '{{ url('admin/login/submit') }}',
            method: 'post',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                if (response === 'true') {
                    infoBtnSubmit.attr('class','far fa-circle');
                    window.location.href = '{{ url('admin') }}';
                } else {
                    infoBtnSubmit.attr('class','far fa-circle');
                    Swal.fire(
                        'Gagal!',
                        'Username atau Password Salah',
                        'warning'
                    )
                }
            }
        })
    })
</script>

<!-- </body></html> -->
</body>
</html>
