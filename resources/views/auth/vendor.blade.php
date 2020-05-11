@include('headerless')
</header>
    <!-- Header End -->
    <div class="container">
    @include('flashmessage')

            <div class="row mb-5">
                <div class="col-lg-6 ">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form method="POST" action="/vendor/register">
                        @csrf
                            <div class="group-input">
                                <label for="name">{{ __('Name') }}*</label>
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="group-input">
                                <label for="username">{{ __('E-Mail Address') }} *</label>
                                <div class="">
                                    <input id="username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="group-input">
                                <label for="pass">{{ __('Password') }} *</label>
                                <div class="">
                                    <input id="pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">{{ __('Confirm Password') }} *</label>
                                <div class="">
                                    <input id="con-pass" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="site-btn register-btn">{{ __('Register') }}</button>
                        </form>
                        
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form method="POST" action="/vendor/login">
                        @csrf

                            <div class="group-input">
                                <label for="username">{{ __('E-Mail Address') }} *</label>
                                <div class="">
                                    <input id="username" type="email" class="form-control @error('vendorEmail') is-invalid @enderror" name="vendorEmail" value="{{ old('vendorEmail') }}" required autocomplete="email" autofocus>

                                    @error('vendorEmail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="group-input">
                                <label for="pass">{{ __('Password') }} *</label>
                                <div class="">
                                    <input id="pass" type="password" class="form-control @error('vendorPassword') is-invalid @enderror" name="vendorPassword" required autocomplete="current-password">

                                    @error('vendorPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                    {{ __('Remember Me') }}
                                        <input class="form-check-input" type="checkbox" name="remember" id="save-pass" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forget-pass">Forget your Password</a>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">{{ __('Login') }}</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
 @include('footer')


<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/jquery.dd.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
</body>

</html>