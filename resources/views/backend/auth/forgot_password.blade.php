@include('backend.layout.headerFront')
@include('sweetalert::alert')
<!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->

<!-- Content -->
<div class="container-xxxl" style="background-image: url('assets/img/bg-01.jpg');">
    {{-- <div class="container-xxxl wrap-login100"> --}}
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body ">
                    <!-- Logo -->
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/img/logo-pvc.png') }}" alt="" height="130" width="130">
                    </div>
                    <div class="app-brand justify-content-center"> 
                        <span class="app-brand-text demo  fw-bolder">PT. PANORAMA VARIA CIPTA</span>
                    </div>
                    <!-- /Logo -->
                    <p class="mb-4">Silakan masukkan email Anda untuk mereset password</p>

                    <form id="formAuthentication" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: black">{{ __('Email') }}</label>
                            <input type="text" style="color: black" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required id="email" name="email"
                                placeholder="Enter your email" autofocus>
                        </div>
                        <div class="col">
                            <button type="submit" class="col btn btn-dark-blue d-grid w-100 mb-4" style="color: white">{{ __('Kirim Link Reset Password') }}</button>
                        </div>
                    </form>
                    </span>
                        <a href="{{ route('login') }}">
                            <small>Back to Login Page</small>
                        </a>
                    <span>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<!--/ Content -->


@include('backend.layout.footerFront')
