<x-guest-layout>

    <div class="authentication-inner row m-0">
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            <div class="w-100 d-flex justify-content-center">
                <img src="{{ asset('assets/img/girl-with-laptop-light.png') }}" class="img-fluid scaleX-n1-rtl"
                    alt="Login image" width="700">

            </div>
        </div>

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
            <div class="w-px-400 mx-auto mt-12 pt-5">
                <!-- Logo -->
                <x-application-logo />
                <!-- /Logo -->
                <h4 class="mb-1">Adventure starts here 🚀</h4>
                <p class="mb-6">Make your app management easy and fun!</p>

                <form id="" class="mb-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label @error('name') text-danger @enderror">Nama
                            Lengkap</label>
                        <input type="name" class="form-control @error('name') is-invalid text-danger @enderror"
                            id="name" name="name" value="{{ old('name') }}" placeholder="Masukan Nama lengkap"
                            autofocus />
                        @error('name')
                            <div class="invalid-feedback d-flex align-item-center">
                                <i class='bx bx-x'></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label @error('email') text-danger @enderror">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid text-danger @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Masukan email"
                            autofocus />
                        @error('email')
                            <div class="invalid-feedback d-flex align-item-center">
                                <i class='bx bx-x'></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label @error('password') text-danger @enderror"
                                for="password">Password</label>
                            {{-- <a href="auth-forgot-password-cover.html">
                                <small>Forgot Password?</small>
                            </a> --}}
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid text-danger @enderror" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-flex align-item-center">
                                <i class='bx bx-x'></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label @error('ulangi_password') text-danger @enderror"
                                for="ulangi_password">Ulangi
                                Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="ulangi_password"
                                class="form-control @error('ulangi_password') is-invalid text-danger @enderror"
                                name="ulangi_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="ulangi_password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        @error('ulangi_password')
                            <div class="invalid-feedback d-flex align-item-center">
                                <i class='bx bx-x'></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                            <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">
                        Sign up
                    </button>
                </form>

                <p class="text-center mt-3">
                    <span>Already have an account?</span>
                    <a href="/">
                        <span>Sign in instead</span>
                    </a>
                </p>

            </div>
        </div>
        <!-- /Register -->

    </div>

</x-guest-layout>
