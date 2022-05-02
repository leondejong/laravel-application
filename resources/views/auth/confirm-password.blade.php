@push('css')
    <style>
        .confirm {
            margin: 1rem;
        }
        .confirm__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .confirm__title {
            text-align: center;
            margin: 1rem;
        }
        .confirm__message {
            margin-bottom: 1rem;
        }
        .confirm__password,
        .confirm__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="confirm">
        <x-box class="confirm__box">
            <h3 class="confirm__title">{{ __('Confirm Password') }}</h3>
            <div class="confirm__message">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
            <x-status class="confirm__status" :status="session('status')" />
            <x-errors class="confirm__errors" :errors="$errors" />
            <form method="post" action="{{ route('password.confirm') }}" class="confirm__form">
                @csrf
                <x-input type="password" name="password" id="password" class="confirm__password" :placeholder="__('Password')" required autofocus autocomplete="current-password" />
                <x-button type="submit" class="confirm__submit">
                    {{ __('Confirm') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
