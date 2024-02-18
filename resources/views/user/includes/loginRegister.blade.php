<div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <!-- Login form -->
                @if ($showLoginForm)
                <form id="login_form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" name="userName" class="form-control" placeholder="Username" required="">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div>                        
                    <button type="submit" class="btn btn-default submit">Log in</button>
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
                        <input type="text" name="fullName" class="form-control" placeholder="Fullname" required="">
                    </div>
                    <div>
                        <input type="text" name="userName" class="form-control" placeholder="Username" required="">
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Submit</button>                
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
                        <h1><i class="fa fa-car"></i> Rent Car Admin</h1>
                        <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                    </div>
                </div>
            </section>
        </div>
    </div>