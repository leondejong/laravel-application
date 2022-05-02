@push('css')
    <style>
        .login {
            margin: 1rem;
        }
        .login__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .login__title {
            text-align: center;
            margin: 1rem;
        }
        .login__email,
        .login__password,
        .login__remember,
        .login__forgot,
        .login__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="login">
        <x-box class="login__box">
            <h3 class="login__title">{{ __('Login') }}</h3>
            <x-status class="login__status" :status="session('status')" />
            <x-errors class="login__errors" :errors="$errors" />
            <form method="post" action="{{ route('login') }}" class="login__form">
                @csrf
                <x-input type="email" name="email" id="email" class="login__email" :placeholder="__('E-mail')" :value="old('email')" required autofocus />
                <x-input type="password" name="password" id="password" class="login__password" :placeholder="__('Password')" required autocomplete="current-password" />
                <label for="remember-me" class="login__remember">
                    <input type="checkbox" name="remember" id="remember-me" class="login__remember-input">
                    <span class="login__remember-text">{{ __('Remember Me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="login__forgot link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <x-button type="submit" class="login__submit">
                    {{ __('Log In') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
