@push('css')
    <style>
        .overview__main {
            margin: 0 10% 4rem 10%;
        }
        .overview__heading {
            margin: 3rem 0 1rem 0;
            text-align: center;
        }
        .overview__status {
            margin-bottom: 1rem;
        }
        .overview__pagination {
            margin-top: 1rem;
            text-align: right;
        }
    </style>
@endpush
<x-base-layout>
    <div class="overview">
        <x-header>
            <x-link
                :href="route('items.create')"
                class="index__link"
            >
                {{ __('New Item') }}
            </x-link>
        </x-header>
        <main class="overview__main">
            <h1 class="overview__heading">Collection</h1>
            <x-status class="overview__status" :status="session('status')" />
            <table class="table">
                <thead class="table__header">
                    <tr class="table__row table__row--heading">
                        <th class="table__heading">Id</th>
                        <th class="table__heading">Name</th>
                        <th class="table__heading">Active</th>
                        <th class="table__heading">Type</th>
                        <th class="table__heading">Actions</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    @foreach ($collection as $item)
                        <tr class="table__row table__row--data">
                            <td class="table__data">{{ $item->id }}</td>
                            <td class="table__data">{{ $item->name }}</td>
                            <td class="table__data">{{ $item->active ? 'true' : 'false' }}</td>
                            <td class="table__data">{{ $item->type }}</td>
                            <td class="table__data">
                                <x-link
                                    :href="route('items.show', ['item' => $item])"
                                    class="overview__show button-link--small button-link--light"
                                >
                                    {{ __('Show') }}
                                </x-link>
                                <x-link
                                    :href="route('items.edit', ['item' => $item])"
                                    class="overview__edit button-link--small button-link--blue"
                                >
                                    {{ __('Edit') }}
                                </x-link>
                                <form
                                    method="post"
                                    action="{{ route('items.destroy', ['item' => $item]) }}"
                                    class="overview__form"
                                    style="display:inline-block;"
                                >
                                    @method('delete')
                                    @csrf
                                    <x-button type="submit" class="overview__remove button--small button--red">
                                        {{ __('Remove') }}
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($collection instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="overview__pagination">
                    @if($collection->previousPageUrl())
                        <x-link
                            :href="$collection->previousPageUrl()"
                            class="overview__next button-link--small button-link--dark"
                        >
                            {{ __('Previous') }}
                        </x-link>
                    @endif
                    @if($collection->nextPageUrl())
                        <x-link
                            :href="$collection->nextPageUrl()"
                            class="overview__next button-link--small button-link--dark"
                        >
                            {{ __('Next') }}
                        </x-link>
                    @endif
                </div>
            @endif
        </main>
        <x-footer class="overview__footer" />
    </div>
</x-base-layout>
