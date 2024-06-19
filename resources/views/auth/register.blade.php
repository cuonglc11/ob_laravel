@extends('layouts.app')

@section('content')
<div class="container">
    <div class="layout_login">
       <ul class="nav nav-tabs justify-content-center">
           <li class="nav-item">
               <a class="tab_link active"  href="{{route('login')}}">Log In</a>
           </li>
           <li class="nav-item login-item">
               <a class="tab_link" href="{{route('register')}}">Sign Up</a>
           </li>
       </ul>
       <div class="tab-content" style="margin-top: 1rem; width: 100%;">
           <div>
            <ul style="color: red; list-style-type: none;font-size: 1rem;font-style: italic;opacity: 100%;border: none;">
                @if ($errors->has('ref'))
                <li style="opacity: 100%;border: none;font-style: oblique;font-weight: 200;">{{ $errors->first('ref') }}</li>
            @endif
            </ul>
               <form method="POST" action="{{ route('register') }}">
                   @csrf
                   <div class="row mb-3">
                    <input type="hidden" name="ref" value="{{ request()->query('ref') }}">

                       <div class="col-md-12">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                           @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>
                   <div class="row mb-3">

                       <div class="col-md-12">
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>
                   <div class="row mb-3">

                       <div class="col-md-12">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="new-password">

                           @error('password')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>
                   <div class="row mb-3">
                       <div class="col-md-12">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                       </div>
                   </div>
                   <div class="row mb-0">
                           <button type="submit" class="btn-custom">
                               {{ __('Register') }}
                           </button>
                   </div>
               </form>

           </div>

       </div>

    </div>
</div>

@endsection
