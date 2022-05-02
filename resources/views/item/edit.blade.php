@push('css')
    <style>
        .edit__main {
            margin: 1rem;
        }
        .edit__box {
            min-width: 32rem;
            padding: 2rem 1rem;
        }
        .edit__title {
            text-align: center;
            margin: 1rem;
        }
        .edit__name,
        .edit__active,
        .edit__type,
        .edit__content,
        .edit__submit {
            display: block;
            width: 100%;
            margin-top: 1rem;
        }
        .login__active-input,
        .login__active-text {
            vertical-align: middle;
        }
        .edit__remove,
        .edit__button {
            width: 100%;
        }
        .edit__remove {
            margin-top: 1rem;
        }
    </style>
@endpush
<x-base-layout>
    <div class="edit">
        <x-header>
            <x-link
                :href="route('items.overview')"
                class="edit_index"
            >
                {{ __('Overview') }}
            </x-link>
        </x-header>
        <main class="index__main">
            <x-box class="edit__box">
                <h3 class="edit__title">{{ $title }}</h3>
                <x-status class="edit__status" :status="session('status')" />
                <x-errors class="edit__errors" :errors="$errors" />
                <form method="post" action="{{ $action }}" class="edit__form">
                    @method($method)
                    @csrf
                    <x-input type="text" name="name" id="name" class="edit__name" :placeholder="__('Name')" :value="old('name', $item['name'])" required autofocus />
                    <x-input type="number" name="type" id="type" class="edit__type" :placeholder="__('Type')" :value="old('type', $item['type'])" required />
                    <x-textarea name="content" id="content" class="edit__content" :placeholder="__('Content')">{{ old('content', $item['content']) }}</x-textarea>
                    <label for="active" class="edit__active">
                        <input type="checkbox" name="active" id="active" class="login__active-input" {{ old('active', $item['active']) ? 'checked="checked"' : '' }} />
                        <span class="login__active-text">{{ __('Active') }}</span>
                    </label>
                    <x-button type="submit" class="edit__submit button--blue">
                        {{ $title }}
                    </x-button>
                </form>
                @isset($item->id)
                    <form method="post" action="{{ route('items.destroy', ['item' => $item]) }}" class="edit__remove">
                        @method('delete')
                        @csrf
                        <x-button type="submit" class="edit__button button--red">
                            {{ __('Remove Item') }}
                        </x-button>
                    </form>
                @endisset
            </x-box>
        </main>
        <x-footer class="edit__footer" />
    </div>
</x-base-layout>
