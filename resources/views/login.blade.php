@extends('user.tampletes.log')
@section('content')

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <!-- Login form -->
                @if ($showLoginForm)
                <form id="login_form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" name="userName" class="form-control" placeholder="User Name" required="">
                        @error('userName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>                              
                        @enderror
                    </div>
                    <div>                        
                        <a class="btn btn-default submit" href="{{route('verification.notice')}}" onclick="document.getElementById('hiddenSubmitButton').click(); return false;">Log in</a>
                        <button id="hiddenSubmitButton" type="submit" style="display: none;"></button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>
                </form>
                @endif

                <!-- Registration form -->
                @if ($showRegistrationForm)
                <form id="registration_form" action="{{ route('createAccount') }}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" name="fullName" value="{{ old('fullName') }}" class="form-control" placeholder="Full Name" required="">
                        @error('fullName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="userName" value="{{ old('userName') }}" class="form-control" placeholder="User Name" required="">
                        @error('userName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required="">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="{{route('login')}}" onclick="document.getElementById('hiddenSubmitButton').click(); return false;">Submit</a>
                        <button id="hiddenSubmitButton" type="submit" style="display: none;"></button>
                    </div>
                </form>
                @endif

                <div class="clearfix"></div>

                <div class="separator">
                    @if ($showLoginForm)
                    <p class="change_link">New to site?
                        <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                    </p>
                    @endif

                    @if ($showRegistrationForm)
                    <p class="change_link">Already a member ?
                        <a href="{{ route('login') }}" class="to_register"> Log in </a>
                    </p>
                    @endif

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-car"></i> Rent Car </h1>
                        <p>©2016 All Rights Reserved. Rent Car is a Bootstrap 4 template. Privacy and Terms</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection