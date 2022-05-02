<header {{ $attributes->merge(['class' => 'header']) }}>
    <div class="header__content">
        @if(Auth::check())
            {{ $slot }}
            <form
                method="post"
                action="{{ route('logout') }}"
                class="header__form"
                style="display: inline-block;"
            >
                @csrf
                <x-link
                    :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    class="header__logout button-link--dark"
                >
                    {{ __('Log Out') }}
                </x-link>
            </form>
        @else
            <div>
                <x-link
                    :href="route('register')"
                    class="header__register"
                >
                    {{ __('Register') }}
                </x-link>
                <x-link
                    :href="route('login')"
                    class="header__login button-link--dark"
                >
                    {{ __('Log In') }}
                </x-link>
            </div>
        @endif
    </div>
    <div class="header__spacing"></div>
</header>
