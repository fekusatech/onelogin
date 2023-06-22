 @extends('layouts.main')
 @section('container')

 <div class="card">
     <div class="card-body login-card-body">
         <p class="login-box-msg">Log in to start your session</p>
         @if(session()->has('success'))
         <div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <h5><i class="icon fas fa-check"></i></h5>
             {{ session('success') }}
         </div>
         @endif

         @if(session()->has('loginError'))
         <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
             {{ session('loginError') }}
         </div>
         @endif

         <form action="{{url('login')}}" method="post">
             @csrf
             <div class="input-group mb-3">
                 <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" name="email" required autofocus>
                 <div class="input-group-append">
                     <div class="input-group-text">
                         <span class="fas fa-envelope"></span>
                     </div>
                 </div>
             </div>
             @error('email')
             <div class="invalid-feedback">
                 {{ $message }}
             </div>
             @enderror

             <div class="input-group mb-3">
                 <input type="password" class="form-control" placeholder="Password" name="password">
                 <div class="input-group-append">
                     <div class="input-group-text">
                         <span class="fas fa-lock"></span>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-4 text-start">
                     <button type="submit" class="btn btn-sm btn-primary btn-block">Log In</button>
                 </div>
                 <div class="col-8 text-start">
                     &nbsp;
                 </div>
             </div>
             <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
         </form>
     </div>
     <!-- /.login-card-body -->
 </div>
 <!-- /.login-box -->
 @endsection