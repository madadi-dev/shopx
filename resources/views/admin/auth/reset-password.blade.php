<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>Reset Password</title>

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

        {{-- Reset Password Card --}}
        <form
            class="card card-md"
            method="POST"
            action="{{ route('admin.password.store') }}"
            autocomplete="off"
            novalidate
        >
            @csrf

            {{-- Password Reset Token --}}
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <div class="card-body">

                <h2 class="card-title text-center mb-4">
                    Reset Password
                </h2>

                <p class="text-secondary mb-4">
                    Enter your email address and choose a new password
                    for your account.
                </p>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">
                        New Password
                    </label>

                    <div class="input-group input-group-flat">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter new password"
                            required
                            autocomplete="new-password"
                        >

                        <span class="input-group-text">
                            <a href="#"
                               class="link-secondary"
                               title="Show password"
                               data-bs-toggle="tooltip"
                               onclick="togglePassword(event, 'password')">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     fill="none"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none"
                                          d="M0 0h24v24H0z"
                                          fill="none"/>
                                    <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                    <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"/>
                                </svg>
                            </a>
                        </span>
                    </div>

                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">
                        Confirm Password
                    </label>

                    <div class="input-group input-group-flat">

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirm password"
                            required
                            autocomplete="new-password"
                        >

                        <span class="input-group-text">
                            <a href="#"
                               class="link-secondary"
                               title="Show password"
                               data-bs-toggle="tooltip"
                               onclick="togglePassword(event, 'password_confirmation')">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     fill="none"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none"
                                          d="M0 0h24v24H0z"
                                          fill="none"/>
                                    <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                    <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"/>
                                </svg>
                            </a>
                        </span>
                    </div>

                    @error('password_confirmation')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>

        {{-- Back To Login --}}
        <div class="text-center text-secondary mt-3">
            Remember your password?
            <a href="{{ route('admin.login') }}">
                Back to login
            </a>
        </div>

    </div>
</div>

{{-- Tabler JS --}}
<script src="{{ asset('assets/admin/js/tabler.min.js') }}"></script>

<script>
    function togglePassword(event, fieldId) {
        event.preventDefault();

        const input = document.getElementById(fieldId);

        input.type = input.type === 'password'
            ? 'text'
            : 'password';
    }
</script>

</body>
</html>
