@push('css')
    <style>
        .verify {
            margin: 1rem;
        }
        .verify__box {
            width: 32rem;
            padding: 2rem 1rem;
        }
        .verify__title {
            text-align: center;
            margin: 1rem;
        }
        .verify__message {
            margin-bottom: 1rem;
        }
        .verify__send {
            color: var(--blue);
            font-weight: 700;
        }
        .verify__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="verify">
        <x-box class="verify__box">
            <h3 class="verify__title">{{ __('Verify E-mail') }}</h3>
            <div class="verify__message">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="verify__send">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            <form method="post" action="{{ route('verification.send') }}" class="verify__form">
                @csrf
                <x-button type="submit" class="verify__submit">
                    {{ __('Resend Verification Email') }}
                </x-button>
            </form>
            <form method="post" action="{{ route('logout') }}" class="verify__form">
                @csrf
                <x-button type="submit" class="verify__submit">
                    {{ __('Logout') }}
                </x-button>
            </form>
        </x-box>
    </div>
</x-base-layout>
