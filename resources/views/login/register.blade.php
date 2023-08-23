 @extends('layouts.main')
 @section('container')

 <div class="card">
     <div class="card-body register-card-body">
         <p class="login-box-msg">Register a new membership</p>
         <form action="{{url('register')}}" method="post">
             @csrf
             <div class="input-group mb-3">
                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                 <div class="input-group-append">
                     <div class="input-group-text">
                         <span class="fas fa-user"></span>
                     </div>
                 </div>
             </div>
             @error('name')
             <div class="invalid-feedback">
                 {{ $message }}
             </div>
             @enderror

             <div class="input-group mb-3">
                 <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username Samakan dengan appdmc" required value="{{ old('username') }}">
                 <div class="input-group-append">
                     <div class="input-group-text">
                         <span class="fas fa-users"></span>
                     </div>
                 </div>
             </div>
             @error('username')
             <div class="invalid-feedback">
                 {{ $message }}
             </div>
             @enderror

             <div class="input-group mb-3">
                 <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" required value="{{ old('email') }}">
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
                 <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required value="{{ old('password') }}">
                 <div class="input-group-append">
                     <div class="input-group-text">
                         <span class="fas fa-lock"></span>
                     </div>
                 </div>
             </div>
             @error('password')
             <div class="invalid-feedback">
                 {{ $message }}
             </div>
             @enderror



             <div class="row">
                 <div class="col-4">
                     <button type="submit" class="btn btn-sm btn-primary btn-block">Register</button>
                 </div>
                 <div class="col-8">
                     &nbsp;
                 </div>
             </div>
         </form>
         <small class="d-block text-center mt-3">Already have a membership? <a href="{{url('login')}}">Login Now!</a></small>
     </div>

 </div>
 @endsection