<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2 ">
            Recherche:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block form-control" />
        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
        </div>
    </div>
    <div wire:loading.delay>
        Chargement...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.number') }}
                            @include('components.table.sort', ['field' => 'number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $subscription)
                        <tr>
                            <td>
                            </td>
                            <td>
                                {{ $subscription->title }}
                            </td>
                            <td>
                                {{ $subscription->number }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('subscription_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.subscriptions.show', $subscription) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('subscription_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.subscriptions.edit', $subscription) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('subscription_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $subscription->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $subscriptions->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
