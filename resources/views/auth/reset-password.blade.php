@push('css')
    <style>
        .reset {
            margin: 1rem;
        }
        .reset__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .reset__title {
            text-align: center;
            margin: 1rem;
        }
        .reset__email,
        .reset__password,
        .reset__confirm,
        .reset__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="reset">
        <x-box class="reset__box">
            <h3 class="reset__title">{{ __('Reset Password') }}</h3>
            <x-status class="reset__status" :status="session('status')" />
            <x-errors class="reset__errors" :errors="$errors" />
            <form method="post" action="{{ route('password.update') }}" class="reset__form">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <x-input type="email" name="email" id="email" class="reset__email" :placeholder="__('E-mail')" :value="old('email')" required />
                <x-input type="password" name="password" id="password" class="reset__password" :placeholder="__('Password')" required autocomplete="current-password" />
                <x-input type="password" name="password_confirmation" id="password_confirmation" class="reset__confirm" :placeholder="__('Confirm Password')" required />
                <x-button type="submit" class="reset__submit">
                    {{ __('Reset Password') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
