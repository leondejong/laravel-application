@push('css')
    <style>
        .forgot {
            margin: 1rem;
        }
        .forgot__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .forgot__title {
            text-align: center;
            margin: 1rem;
        }
        .forgot__email,
        .forgot__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="forgot">
        <x-box class="forgot__box">
            <h3 class="forgot__title">{{ __('Forgot Password?') }}</h3>
            <x-status class="forgot__status" :status="session('status')" />
            <x-errors class="forgot__errors" :errors="$errors" />
            <form method="post" action="{{ route('password.email') }}" class="forgot__form">
                @csrf
                <x-input type="email" name="email" id="email" class="forgot__email" :placeholder="__('E-mail')" :value="old('email')" required autofocus />
                <x-button type="submit" class="forgot__submit">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
