@push('css')
    <style>
        .detail__main {
            margin: 0 15% 4rem 15%;
        }
        .detail__heading {
            margin: 3rem 0 1rem 0;
            text-align: center;
        }
        .detail__type,
        .detail__active,
        .detail__body {
            margin-top: 1rem;
        }
        .detail__body {
            white-space: pre-wrap;
        }
    </style>
@endpush
<x-base-layout>
    <div class="detail">
        <x-header>
            <x-link
                :href="route('items.overview')"
                class="edit_index"
            >
                {{ __('Overview') }}
            </x-link>
        </x-header>
        <main class="detail__main">
            <h1 class="detail__heading">{{ $item->name }}</h1>
            <x-status class="detail__status" :status="session('status')" />
            <div class="detail__type"><strong>Type: {{ $item->type }}</strong></div>
            <div class="detail__active"><strong>Active: {{ $item->active ? 'true' : 'false' }}</strong></div>
            <p class="detail__body">{{ $item->content }}</p>
        </main>
        <x-footer class="detail__footer" />
    </div>
</x-base-layout>
