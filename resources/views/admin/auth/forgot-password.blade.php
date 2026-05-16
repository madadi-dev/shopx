<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>Forgot Password</title>

    {{-- Tabler CSS --}}
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet"/>

    <style>
        @import url('https://rsms.me/inter/inter.css');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="d-flex flex-column">
<script src="{{ asset('assets/admin/js/demo-theme.min.js') }}"></script>

<div class="page page-center">
    <div class="container container-tight py-4">

        {{-- Logo --}}
        <div class="text-center mb-4">
            <a href="{{ route('admin.login') }}"
               class="navbar-brand navbar-brand-autodark">
                <img
                    src="{{ asset('assets/admin/static/logo.svg') }}"
                    height="36"
                    alt="ShopX"
                    class="navbar-brand-image"
                >
            </a>
        </div>

        {{-- Forgot Password Card --}}
        <form
            class="card card-md"
            action="{{ route('admin.password.email') }}"
            method="POST"
            autocomplete="off"
            novalidate
        >
            @csrf

            <div class="card-body">

                <h2 class="card-title text-center mb-4">
                    Forgot Password
                </h2>

                <p class="text-secondary mb-4">
                    Forgot your password? No problem.
                    Enter your email address and we will send you
                    a password reset link.
                </p>

                {{-- Success Status --}}
                <x-auth-session-status
                    class="alert alert-success"
                    :status="session('status')"
                />

                {{-- Email Address --}}
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email"
                        required
                        autofocus
                        autocomplete="email"
                    />

                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-2"
                             width="24"
                             height="24"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"/>
                            <path d="M3 7l9 6l9 -6"/>
                        </svg>

                        Email Password Reset Link
                    </button>
                </div>
            </div>
        </form>

        {{-- Back To Login --}}
        <div class="text-center text-secondary mt-3">
            Remember your password?
            <a href="{{ route('admin.login') }}" tabindex="-1">
                Back to login
            </a>
        </div>

    </div>
</div>

{{-- Tabler JS --}}
<script src="{{ asset('assets/admin/js/tabler.min.js') }}"></script>

</body>
</html>
