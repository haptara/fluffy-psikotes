<x-guest-layout>
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            <div class="w-100 d-flex justify-content-center">
                <img src="{{ asset('assets/img/boy-with-rocket-light.png') }}" class="img-fluid" alt="Login image"
                    width="700" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <x-application-logo />
                <!-- /Logo -->
                <h4 class="mb-2">Welcome to Fluffy Psikotes! 👋</h4>
                <p class="mb-4">
                    Please sign-in to your account and start the test
                </p>

                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="mb-3" method="POST" action="/login" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label @error('email') text-danger @enderror">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid text-danger @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
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
                    <button type="submit" class="btn btn-primary w-100"><i class='bx bx-log-in'></i> Sign in</button>
                </form>

                {{-- <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="{{ route('register') }}">
                        <span>Create an account</span>
                    </a>
                </p> --}}

                {{-- <div class="divider my-4">
                    <div class="divider-text">or</div>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3 w-100">
                        <i class="tf-icons bx bxl-google"></i> Sign in with Google
                    </a>
                </div> --}}
            </div>
        </div>
        <!-- /Login -->
    </div>
</x-guest-layout>
