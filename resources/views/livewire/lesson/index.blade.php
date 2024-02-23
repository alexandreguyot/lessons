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
                            {{ trans('cruds.lesson.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.day') }}
                            @include('components.table.sort', ['field' => 'day'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.date_start') }}
                            @include('components.table.sort', ['field' => 'date_start'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.date_end') }}
                            @include('components.table.sort', ['field' => 'date_end'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.hour') }}
                            @include('components.table.sort', ['field' => 'hour'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.student') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td>
                            </td>
                            <td>
                                {{ $lesson->title }}
                            </td>
                            <td>
                                {{ $lesson->day_label }}
                            </td>
                            <td>
                                {{ $lesson->date_start }}
                            </td>
                            <td>
                                {{ $lesson->date_end }}
                            </td>
                            <td>
                                {{ $lesson->hour }}
                            </td>
                            <td>
                                @foreach($lesson->student as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->lastname }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('lesson_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.lessons.show', $lesson) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('lesson_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.lessons.edit', $lesson) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('lesson_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $lesson->id }})" wire:loading.attr="disabled">
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
            {{ $lessons->links() }}
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
