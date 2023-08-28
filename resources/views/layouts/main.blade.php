<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    {{-- My Style --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('assets/logodmc-icon.png')}}" type="image/x-icon">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Toast bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">

    <style>
        .floating-card {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 700px;
            padding: 20px;
            background-color: #e9ecef;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">
                <b>OneLogin | </b> {{ $title }}
            </div>
        </div>
        @yield('container')
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>
    @if(session()->has('success'))
    <script>
        toastr.success('{{ session("success") }}')
    </script>
    @endif

    @if(session()->has('loginError'))
    <script>
        toastr.error('{{ session("loginError") }}')
    </script>
    @endif

</body>

</html>