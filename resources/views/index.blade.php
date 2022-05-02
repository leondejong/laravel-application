@push('css')
    <style>
        .index__heading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endpush
<x-base-layout>
    <div class="index">
        <x-header class="index__header" />
        <h1 class="index__heading">{{ __('Angular Application') }}</h1>
        <x-footer class="index__footer" />
    </div>
</x-base-layout>
