@push('css')
    <style>
        .register {
            margin: 1rem;
        }
        .register__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .register__title {
            text-align: center;
            margin: 1rem;
        }
        .register__name,
        .register__email,
        .register__password,
        .register__confirm,
        .register__registered,
        .register__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="register">
        <x-box class="register__box">
            <h3 class="register__title">{{ __('Register') }}</h3>
            <x-status class="register__status" :status="session('status')" />
            <x-errors class="register__errors" :errors="$errors" />
            <form method="post" action="{{ route('register') }}" class="register__form">
                @csrf
                <x-input type="text" name="name" id="name" class="register__name" :placeholder="__('Name')" :value="old('name')" required autofocus />
                <x-input type="email" name="email" id="email" class="register__email" :placeholder="__('E-mail')" :value="old('email')" required />
                <x-input type="password" name="password" id="password" class="register__password" :placeholder="__('Password')" required autocomplete="current-password" />
                <x-input type="password" name="password_confirmation" id="password_confirmation" class="register__confirm" :placeholder="__('Confirm Password')" required />
                <a class="link register__registered" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button type="submit" class="register__submit">
                    {{ __('Register') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
